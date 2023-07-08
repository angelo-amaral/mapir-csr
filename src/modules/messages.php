<?php

function printMessage($message) {
    if ($message=='success-create')
        return '<span class="text-success">Cadastro realizado com sucesso!</span>';
    if ($message=='error-create')
        return '<span class="text-error">Erro ao realizar cadastro.</span>';

    if ($message=='success-remove')
        return '<span class="text-success">Registro removido com sucesso!</span>';
    if ($message=='error-remove')
        return '<span class="text-error">Erro ao remover o registro.</span>';

    if ($message=='success-update')
        return '<span class="text-success">Registro atualizado com sucesso!</span>';
    if ($message=='error-update')
        return '<span class="text-error">Erro ao atualizar o registro.</span>';
}
