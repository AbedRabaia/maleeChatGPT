<?php

namespace App\Controllers\Chat;

use Twilio\Rest\Client;

class Home extends BaseController
{

    private $url = getenv('OPENAI-URL');
    private $xApiKey = getenv('OPENAI-KEY');

    public function malee()
    {
    }

    public function report()
    {
        $model = new UsersProgressV2Model();
        return view('chatReport', ['report' => $model->getReport()]);
    }
    public function index()
    {
        return view('chat');
    }

    public function advice($playerId)
    {
        logChatAction($playerId, ' بعد الاطلاع على سلوك اللاعب ومراعاة توجيهات كتابة النصائح اكتب نصيحة الآن
        ');
        $data = $this->callApi('chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => getChat($playerId)
        ]);
        $message = $data->choices[0]->message->content;
        logChatRespnce($playerId, $message);
        return $message;
    }

    public function reportChat()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            if (!isset($post['messages'])) {
                $post['messages'] = [];
            }
            array_unshift($post['messages'], ['role' => 'user', 'content' =>  'قم بشرح الاهداف ونتائجها ضمن قائمة و ثم قم بكتابة بعض النصائح للمعلم ليطبقها في الغرفة الصفية لتحسين النتائج بتنسيق html']);
            $report = json_decode($post['report']);
            foreach ($report as $key => $val) {
                array_unshift($post['messages'], ['role' => 'user', 'content' =>  'تحقيق هدف ' . $key . ' ' . $val . '%']);
            }
            array_unshift($post['messages'], ['role' => 'user', 'content' => file_get_contents('reportDescription.text')]);
            array_unshift($post['messages'], ['role' => 'user', 'content' => 'Please response in arabic only and in clear and short answers no matter what I ask after that in HTML format']);

            $data = $this->callApi('chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => $post['messages']
            ]);
            echo $data->choices[0]->message->content;
        } else {
            http_response_code(500);
        }
    }

    public function responce()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            array_unshift($post['messages'], ['role' => 'user', 'content' => file_get_contents('reportDescription.text')]);
            array_unshift($post['messages'], ['role' => 'user', 'content' => 'Please response in arabic only and in clear and short answers no matter what I ask after that']);

            $data = $this->callApi('chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => $post['messages']
            ]);
            echo $data->choices[0]->message->content;
        } else {
            http_response_code(500);
        }
    }

    public function whatsApp()
    {
        helper('chatGpt_helper');
        $post = $this->request->getPost();
        if (!empty($post)) {
            $mobile = '+' . $post['WaId'];
            $model = new WhatsappSessionsModel();
            $session = $model->where('mobile', $mobile)->first();
            if (empty($session)) {
                $this->sendWhatsApp($mobile, 'اهلا بكم في مساعد ميم عين الرقمي');
                $this->sendWhatsApp($mobile, 'هذه التقنية مطورة باستخدام نظام الذكاء الاصطناعي ChatGPT');
                $this->sendWhatsApp($mobile, 'يرجى ارسال رمز الطفل حتى تتمكن من متابعة حالته');
                $model->insert(['mobile' => $mobile, 'player_id' => 0]);
            } else {
                if ($session->player_id == 0) {
                    $usersModel = new UsersModel();
                    $user = $usersModel->find($post['Body']);
                    if (!empty($user)) {
                        $session->player_id = $user->id;
                        $model->save($session);
                        $progressModel = new UsersProgressV2Model();
                        $report = $progressModel->getReport(['user_id' => $session->player_id]);
                        $messages[] = ['role' => 'user', 'content' => 'Please response in arabic only and in clear and short answers no matter what I ask after that'];
                        $messages[] = ['role' => 'user', 'content' => file_get_contents('reportDescription.text')];
                        $messages[] = ['role' => 'user', 'content' => 'I will send you resaults for a kid who played the game'];
                        $messages[] = ['role' => 'user', 'content' =>  'تحقيق هدف تقدير الأعمال الخيرية والمسؤولية تجاه الآخرين ' . $report[1]->avg . '%'];
                        $messages[] = ['role' => 'user', 'content' =>  'تحقيق هدف التشجيع على الادخار وتقديره ' . $report[2]->avg . '%'];
                        $messages[] = ['role' => 'user', 'content' =>  'تحقيق هدف التخطيط للشراء وتحديد الآثار المترتبة على قرارات الشراء ' . $report[3]->avg . '%'];
                        $messages[] = ['role' => 'user', 'content' =>  'تحقيق هدف تحديد مصادر الدخل المختلفة ' . $report[4]->avg . '%'];
                        $messages[] = ['role' => 'user', 'content' =>  'تحقيق هدف تحديد الأولويات بناء على الحاجات و الرغبات ' . $report[5]->avg . '%'];
                        $messages[] = ['role' => 'user', 'content' => 'اسم الطفل ' . $user->name . ' , حدثني كأنني ولي امر هذا الطفل واشرح لي تفاصيل هذا التقرير و ماذا يجب ان افعل لتحسين النتائج'];
                        startParentChat($session->id, $messages);
                        $data = $this->callApi('chat/completions', [
                            'model' => 'gpt-3.5-turbo',
                            'messages' => getParentChat($session->id)
                        ]);
                        $message = $data->choices[0]->message->content;
                        logParentChatAction($session->id, $message);
                        $this->sendWhatsApp($mobile, $message);
                    } else {
                        $this->sendWhatsApp($mobile, 'رمز الطفل خاطئ يرجى التأكد من الرمز وارساله مرة اخرى');
                    }
                } else {
                    logParentChatAction($session->id, $post['Body']);
                    $data = $this->callApi('chat/completions', [
                        'model' => 'gpt-3.5-turbo',
                        'messages' => getParentChat($session->id)
                    ]);
                    $message = $data->choices[0]->message->content;
                    logParentChatAction($session->id, $message);
                    $this->sendWhatsApp($mobile, $message);
                }
            }
        }
    }

    public function sendWhatsApp($mobile, $message)
    {
        $sid = getenv('TWILIO-ID');
        $token = getenv('TWILIO-TOKEN');
        $from = getenv('TWILIO-SENDER');
        $twilio = new Client($sid, $token);
        $twilio->messages
            ->create(
                "whatsapp:" . $mobile, // to
                [
                    "from" => "whatsapp:" . $from,
                    "body" => $message
                ]
            );
    }
    public function callApi($api, $post)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . $api,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => !empty($post) ? 'POST' : 'GET',
            CURLOPT_POSTFIELDS => !empty($post) ? json_encode($post) : null,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Bearer ' . $this->xApiKey,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}
