<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cns implements Rule
{
    public function passes($attribute, $value)
    {
        return $this->validaCns($value) || $this->validaCnsProv($value);
    }

    public function message()
    {
        return 'O CNS é inválido.';
    }

    private function validaCns($cns)
    {
        if (strlen($cns) != 15) {
            return false;
        }

        $soma = 0;
        $pis = substr($cns, 0, 11);

        for ($i = 0; $i < 11; $i++) {
            $soma += (intval($pis[$i]) * (15 - $i));
        }

        $resto = $soma % 11;
        $dv = 11 - $resto;
        $dv = ($dv == 10) ? 0 : $dv;
        $dv = ($dv == 11) ? 0 : $dv;

        if ($dv == 0) {
            $soma = 0;
            for ($i = 0; $i < 11; $i++) {
                $soma += (intval($pis[$i]) * (15 - $i));
            }
            $soma += 2;
            $resto = $soma % 11;
            $dv = 11 - $resto;
            $dv = ($dv == 10) ? 0 : $dv;
            $dv = ($dv == 11) ? 0 : $dv;
        }

        $resultado = $pis . (($cns[11] == '0') ? '001' : '000') . $dv;

        return $cns === $resultado;
    }

    private function validaCnsProv($cns)
    {
        if (strlen($cns) != 15) {
            return false;
        }

        $soma = 0;

        for ($i = 0; $i < 15; $i++) {
            $soma += (intval($cns[$i]) * (15 - $i));
        }

        $resto = $soma % 11;

        return $resto == 0;
    }
}
