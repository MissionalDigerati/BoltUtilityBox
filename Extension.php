<?php
/**
 * This file is part of Bolt Utility Box Bolt CMS Extension.
 * 
 * Bolt Utility Box Bolt CMS Extension is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Bolt Utility Box Bolt CMS Extension is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see 
 * <http://www.gnu.org/licenses/>.
 *
 * @author Johnathan Pulos <johnathan@missionaldigerati.org>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * 
 */

namespace Bolt\Extension\MissionalDigerati\BoltUtilityBox;

/**
 * Related Sort is an Extension for the Bolt CMS (@link http://bolt.cm)
 *
 * @package default
 * @author Johnathan Pulos
 **/
class Extension extends \Bolt\BaseExtension
{
    /**
     * Get the name of the extension/
     *
     * @return string
     * @author Johnathan Pulos
     **/
    public function getName()
    {
        return "Bolt Utility Box";
    }

    /**
     * Initialize this extension
     *
     * @return void
     * @access public
     * @author Johnathan Pulos
     **/
    public function initialize()
    {
        $this->addTwigFunction('md5', 'encryptString');
        $this->addTwigFunction('remove_record', 'removeRecords');
    }

    /**
     * md5 hash a given string.  Simply use this Twig tag: {{ md5('string') }}
     *
     * @return string the md5 hashed version of the given string
     * @access public
     * @author Johnathan Pulos
     **/
    public function encryptString($str = "")
    {
        return md5($str);
    }

    /**
     * Removes the given ids from the given object
     *
     * @param array $objectArray an array of Bolt objects to search through
     * @param array $idArray an array of ids to pull out of the array
     * @return array The new object array
     * @access public
     * @author Johnathan Pulos
     **/
    public function removeRecords($objectArray, $idArray)
    {
        $newObjectArray = array();
        foreach ($objectArray as $currentObject) {
            if (!in_array($currentObject['id'], $idArray)) {
                array_push($newObjectArray, $currentObject);
            }
        }
        return $newObjectArray;
    }

}
