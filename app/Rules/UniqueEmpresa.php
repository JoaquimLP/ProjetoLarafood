<?php

namespace App\Rules;

use App\Empresa\ManagerEmpresa;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueEmpresa implements Rule
{
    protected $table, $value, $collun;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $table, $value = null, $collun = 'id')
    {
        $this->table = $table;
        $this->value = $value;
        $this->collun = $collun;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $empresa_id = app(ManagerEmpresa::class)->getEmpresaIdentify();
        $register = DB::table($this->table)
            ->where($attribute, $value)->where('empresa_id', $empresa_id)->first();

        if($register && $register->{$this->collun} == $this->value) return true;

        return is_null($register);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O valor :attribute já em uso';
    }
}
