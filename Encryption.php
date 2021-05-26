<?php

class Encryption
{
    public $vigenere_square;
    public $abjad;

    public function build_data(): array
    {
        $arr = [];

        $abjad = str_split('abcdefghijklmnopqrstuvwxyz');

        $this->abjad = $abjad;

        $current_index_column = 0;

        for ($index_row=0; $index_row < count($abjad); $index_row++) { 
            
            $arr[$index_row] = [];

            $special_index = $current_index_column;

            echo "<tr>";
            for ($index_column=$current_index_column; $index_column < count($abjad) + $current_index_column; $index_column++) { 
                if ($special_index > count($abjad) - 1) {
                    $special_index = 0;
                }
                // echo "<td>{$abjad[$special_index]}</td>";

                $arr[$index_row][] = $abjad[$special_index];
                $special_index++;
            }

            echo "</tr>";

            $current_index_column++;
        }

        $this->vigenere_square = $arr;

        return $arr;
    }

    public function encrypt(string $kata): string
    {
        $explode_string = str_split($kata);
        $index_string = [];

        foreach ($explode_string as $explode_string_index => $explode_string_row) {
            // $index_string[array_search($explode_string_row, $this->abjad)] = $explode_string_index + 1;
            $index_string[] = [
                array_search($explode_string_row, $this->abjad),
                $explode_string_index + 1
            ];
        }

        $result_arr = [];

        foreach ($index_string as $index_string_row) {
            $result_arr[] = $this->vigenere_square[$index_string_row[0]][$index_string_row[1]];
        }

        $result = implode('', $result_arr);

        return $result;
    }
}
