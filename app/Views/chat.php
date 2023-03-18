<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Malee Chat</title>
    <!-- core:css -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/core/core.css') ?>">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/select2/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/jquery-tags-input/jquery.tagsinput.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/dropzone/dropzone.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/dropify/dist/dropify.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/sweetalert2/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/fonts/feather-font/css/iconfont.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/flag-icon-css/css/flag-icon.min.css') ?>">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url('assets/css/demo_5/style.css') ?>?rnd=<?= rand(11111, 99999) ?>">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="<?= base_url('font/fonts.css') ?>?rnd=<?= rand(11111, 99999) ?>" type="text/css" charset="utf-8" />
    <?php if (session('lang') == 'ar') { ?>
        <style>
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            h7,
            p,
            a,
            label,
            .form-control,
            .btn,
            .alert {
                /* font-family: 'Changa', sans-serif; */
                font-family: 'Conv_MyriadArabic-Regular', Sans-Serif;
            }

            .btn-deny {
                color: #fff !important;
                background-color: #10b759 !important;
                border-color: #10b759 !important;
            }
        </style>
    <?php } ?>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= base_url('favicomatic/apple-touch-icon-57x57.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('favicomatic/apple-touch-icon-114x114.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('favicomatic/apple-touch-icon-72x72.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('favicomatic/apple-touch-icon-144x144.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= base_url('favicomatic/apple-touch-icon-60x60.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= base_url('favicomatic/apple-touch-icon-120x120.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= base_url('favicomatic/apple-touch-icon-76x76.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= base_url('favicomatic/apple-touch-icon-152x152.png') ?>" />
    <link rel="icon" type="image/png" href="<?= base_url('favicomatic/favicon-196x196.png') ?>" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?= base_url('favicomatic/favicon-96x96.png') ?>" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?= base_url('favicomatic/favicon-32x32.png') ?>" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url('favicomatic/favicon-16x16.png') ?>" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?= base_url('favicomatic/favicon-128.png') ?>" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?= base_url('favicomatic/mstile-144x144.png') ?>" />
    <meta name="msapplication-square70x70logo" content="<?= base_url('favicomatic/mstile-70x70.png') ?>" />
    <meta name="msapplication-square150x150logo" content="<?= base_url('favicomatic/mstile-150x150.png') ?>" />
    <meta name="msapplication-wide310x150logo" content="<?= base_url('favicomatic/mstile-310x150.png') ?>" />
    <meta name="msapplication-square310x310logo" content="<?= base_url('favicomatic/mstile-310x310.png') ?>" />

</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row chat-wrapper">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height:70vh;">
                                <div class="row position-relative">
                                    <div class="col-lg-12 chat-content" style="display: initial !important;">
                                        <div class="chat-header border-bottom pb-2">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">

                                                    <div>
                                                        <p>Chat GPT</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-body">
                                            <ul class="messages">
                                            </ul>
                                        </div>
                                        <div class="chat-footer d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control rounded-pill" id="chatForm" placeholder="Type a message">
                                            </div>
                                            <div>
                                                <button type="button" onclick="sendMessage()" class="btn btn-primary btn-icon rounded-circle">
                                                    <i data-feather="send"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/vendors/core/core.js') ?>"></script>
    <script src="<?= base_url('assets/vendors//feather-icons/feather.min.js') ?>"></script>
    <script src="<?= base_url('assets//js/template.js') ?>"></script>
    <script src="<?= base_url('assets/js/chat.js') ?>"></script>

    <script>
        $('#chatForm').keypress(function(e) {
            if (e.which == 13) {
                sendMessage();
            }
        });

        function sendMessage() {
            message = $('#chatForm').val();
            if (message != '') {
                $('#chatForm').val('');
                html = '<li class="message-item me"><div class="content"><div class="message"><div class="bubble"><p>' + message + '</p></div></div></div></li>';
                $('.messages').append(html);
                $(".chat-body").animate({
                    scrollTop: 999999999
                });
                var messages = [];
                $(".message-item").each(function() {
                    if ($("#mydiv").hasClass("me")) {
                        role = 'user';
                    } else {
                        role = 'assistant';
                    }
                    messages.push({
                        role: role,
                        content: $(this).text()
                    });
                });
                $.ajax({
                    method: 'post',
                    url: '<?= site_url('chat/home/responce') ?>',
                    data: {
                        message: message,
                        messages: messages
                    },
                    success: function(data) {
                        html = '<li class="message-item friend"><div class="content"><div class="message"><div class="bubble"><p>' + data + '</p></div></div></div></li>';
                        $('.messages').append(html);
                        $(".chat-body").animate({
                            scrollTop: 999999999
                        });
                    }
                });
            }
        }
    </script>

</body>

</html>