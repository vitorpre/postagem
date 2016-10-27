<?php

class ArrayList {

    protected $data_array = array();

    public function __construct($mysql_result) {
        $this->resultToArray($mysql_result);
    }

    private function resultToArray($mysql_result) {
        while ($object = mysql_fetch_object($mysql_result)) {
            $this->data_array[] = (object) $object;
        }
    }

    public function size() {
        return sizeof($this->data_array);
    }

    public function add(stdClass $object) {
        $this->data_array[] = $object;
    }

    public function remove($index) {
        if ($index) {
            $object = $this->data_array[$index];

            $this->data_array[$index] = null;

            unset($this->data_array[$index]);

            return $object;
        } else {
            return null;
        }
    }

    public function get($index) {
        if ($index) {
            if ($index <= sizeof($this->data_array)) {
                $object = $this->data_array[$index];
                return $object;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function fetch() {
        return $this->data_array;
    }

    public function sortByProperty($property) {
        $element = $this->get(1);

        if (property_exists($element, $property)) {
            $aux = null;

            for ($index = 0; $index < sizeof($this->data_array); $index++) {
                $object = $this->data_array[$index];
            }
        }
    }

    public function set(array $array) {
        unset($this->data_array);
        $this->data_array = $array;
    }

}

?>