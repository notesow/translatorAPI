<?php
/**
 * @copyright 2022 | Note SOW 
 * @package translatorAPI
 * @author Davide Perricone
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * This class was developed to connect PHP frameworks with the spediamo.it
 * shipping system. This library is unofficial and uses the connection protocols
 * of the cms. No copyright infringement.
 * Released, developed and maintain by @NOTESOW
 *
 */


namespace notesow\translatorAPI;

/**
 * Simple and fast automatic string translation system for multilingual website.
 */

class translatorAPI
{

    /** @var string The base URL for the translator. */
    public static $BASE_URL = 'https://translate.googleapis.com/translate_a/single?client=gtx&dt=t';

    /** @var string The base content type for the translator. */
    public static $CONTENT_TYPE = '';
    
    public function __construct()
    {
        
    }
}
