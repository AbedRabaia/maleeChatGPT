<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\CloudMachineLearningEngine;

class GoogleCloudMlV1Model extends \Google\Collection
{
  protected $collection_key = 'regions';
  protected $defaultVersionType = GoogleCloudMlV1Version::class;
  protected $defaultVersionDataType = '';
  public $description;
  public $etag;
  public $labels;
  public $name;
  public $onlinePredictionConsoleLogging;
  public $onlinePredictionLogging;
  public $regions;

  /**
   * @param GoogleCloudMlV1Version
   */
  public function setDefaultVersion(GoogleCloudMlV1Version $defaultVersion)
  {
    $this->defaultVersion = $defaultVersion;
  }
  /**
   * @return GoogleCloudMlV1Version
   */
  public function getDefaultVersion()
  {
    return $this->defaultVersion;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOnlinePredictionConsoleLogging($onlinePredictionConsoleLogging)
  {
    $this->onlinePredictionConsoleLogging = $onlinePredictionConsoleLogging;
  }
  public function getOnlinePredictionConsoleLogging()
  {
    return $this->onlinePredictionConsoleLogging;
  }
  public function setOnlinePredictionLogging($onlinePredictionLogging)
  {
    $this->onlinePredictionLogging = $onlinePredictionLogging;
  }
  public function getOnlinePredictionLogging()
  {
    return $this->onlinePredictionLogging;
  }
  public function setRegions($regions)
  {
    $this->regions = $regions;
  }
  public function getRegions()
  {
    return $this->regions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1Model::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Model');
