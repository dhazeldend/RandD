<?php

Yii::import('zii.widgets.CListView');

class EasyTable extends CListView {

    public $searchable = false;
    public $columns = array();

    public function init() {

        $this->itemView = '';
        $this->template = "{items}\n{pager}";
        parent::init();
    }

    public function run() {
        echo CHtml::openTag('div', array('class' => 'easytable')) . "\n";
        if ($this->searchable) {
            $this->renderSearchFilter();
        }
        parent::run();
        echo CHtml::closeTag('div');
    }

    public function renderSearchFilter() {
        echo '<form class="filters">';
        echo '<table>';
        echo '<tr>';
        foreach ($this->columns as $i=>$item) {
            $name = $item['name'];
            $label = $this->dataProvider->model->getAttributeLabel($name);
            $elemId = get_class($this->dataProvider->model).'['.$name.']';
            echo '<td>';
            echo '<label for="'.$elemId.'">'.$label.'</label>';
            // if the search template key is specified.. then render the
            // search template rather than default.
            if (array_key_exists('searchtemplate', $item)) {
                echo $item['searchtemplate'];
            }
            else {
                echo '<input id="'.$elemId.'" type="text" name="'.$elemId.'">';
            }
            echo '</td>';
            // allow only five columns per row.
            if (($i + 1) % 5 == 0 && $i + 1 != sizeof($this->columns))
                echo '</tr><tr>';
        }
        echo '</tr><tr><td>';
        // render a script for the search filter buttons
        // to be able to submit the search form etc...
        // this is the same code that Yii's grid uses
        // to do it's search.
        echo '<script>';
        echo 'function refreshList(id, clear) {
                var filter = $("#" + id).siblings(".filters");
                if (clear) {
                    filter.find("input[type=\'text\'],select").val("");
                }
                $.fn.yiiListView.update(id, { data: filter.serialize() });
            }';
        echo '</script>';
        echo '<input type="button" class="btn" value="Search" onclick="refreshList(\''.$this->id.'\')">';
        echo '<input type="button" class="btn" value="Clear" onclick="refreshList(\''.$this->id.'\', true)">';
        echo '</td></tr>';
        echo '</table>';
        echo '</form>';
    }
    
    public function renderItems() {

        // render the table headers
        //
        echo '<table class="table">';
        echo CHtml::openTag('thead', array('class' => $this->sorterCssClass)) . "\n";
        echo '<tr>';
        $sort = $this->dataProvider->getSort();
        foreach ($this->columns as $item) {
            $label = $item['name'];
            echo '<th>';
            echo $sort->link($label);
            echo '</th>';
        }
        echo '</tr>';
        echo CHtml::closeTag('thead');

        // render the table rows
        //
        echo '<tbody>';
        $data = $this->dataProvider->getData();
        if (($n = count($data)) > 0) {
            foreach ($data as $i => $item) {
                echo '<tr';
                // add the "alt" class to the row
                // if the row number($i) is odd.
                if ($i % 2 != 0) {
                    echo ' class="alt"';
                }
                echo '>';

                foreach ($this->columns as $td) {
                    $value;
                    echo '<td>';
                    // if the template key is specified in the array
                    // then we must process the template to replace the
                    // placeholders with actual values.. the value for
                    // this column will be a template rather than the
                    // value of the property.
                    if (array_key_exists('template', $td)) {
                        $value = $td['template'];
                        $regex = '#<=(.*?)>#';
                        preg_match_all($regex, $value, $matches);

                        // replace the variable placeholder with its
                        // actual value.. i.e <=name> would become 'jack'.
                        foreach ($matches[1] as $match) {
                            $replace = $this->getValue($item, $match);
                            $value = str_replace('<=' . $match . '>', $replace, $value);
                        }
                    }
                    else {
                        $value = $this->getValue($item, $td['name']);
                    }
                    echo $value;
                    echo '</td>';
                }
                echo '</tr>';
            }
        }
        echo '</tbody></table><hr>';
    }

    /**
     * gets the value of a property in an object
     * denoted by the path in $str (ie. user->role->name).
     */
    function getValue($obj, $str) {
        $temp = $obj;
        $props = explode('->', $str);
        foreach ($props as $i => $prop) {
            $temp = $temp[$prop];
        }
        return $temp;
    }
}
