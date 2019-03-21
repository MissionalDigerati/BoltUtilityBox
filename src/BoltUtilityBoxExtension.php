<?php
/**
 * This file is part of BoltUtilityBox Bolt CMS Extension.
 *
 * BoltUtilityBox Bolt CMS Extension is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * BoltUtilityBox Bolt CMS Extension is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see
 * <http://www.gnu.org/licenses/>.
 *
 * @author Missional Digerati <admin@missionaldigerati.org>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
/**
 * Some custom twig utility functions
 *
 * @author Missional Digerati <admin@missionaldigerati.org>
 */
namespace Bolt\Extension\MissionalDigerati\BoltUtilityBox;

use Bolt\Extension\SimpleExtension;

class BoltUtilityBoxExtension extends SimpleExtension
{

    /**
     * md5 hash a given string.  Simply use this Twig tag: {{ md5('string') }}
     *
     * @return string the md5 hashed version of the given string
     * @access public
     * @author Johnathan Pulos
     **/
    public function twigEncryptString($str = "")
    {
        return md5($str);
    }

    /**
     * Sorts an array of objects using the value of the array key ($sortKey)
     *
     * @param array $related Bolt's related() results
     * @param string $sortKey the key to sort by
     * @param string $order which order to sort (asc, desc) default: asc
     * @return array the sorted objects
     * @access public
     * @author Johnathan Pulos
     **/
    public function twigSortObjArray($related, $sortKey, $order = 'asc')
    {
        $order = strtolower($order);
        uasort(
            $related,
            function ($a, $b) use ($sortKey, $order) {
                $compare = strnatcmp($a[$sortKey], $b[$sortKey]);
                if ($order == 'asc') {
                    return $compare;
                } else {
                    return - $compare;
                }
            }
        );
        return $related;
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
    public function twigRemoveRecords($objectArray, $idArray)
    {
        $newObjectArray = array();
        foreach ($objectArray as $currentObject) {
            if (!in_array($currentObject['id'], $idArray)) {
                array_push($newObjectArray, $currentObject);
            }
        }
        return $newObjectArray;
    }

    /**
     * Register our twig functions.
     *
     * @return array    An array of new twig functions
     */
    protected function registerTwigFunctions()
    {
        return [
            'md5'               =>  'twigEncryptString',
            'sort_obj_array'    =>  'twigSortObjArray',
            'remove_record'     =>  'twigRemoveRecords'
        ];
    }
}
