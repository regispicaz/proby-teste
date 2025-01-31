<?php

namespace App\Enums;

enum Status: string
{
    case Pendente = 'Pendente';
    case EmAndamento = 'Em Andamento';
    case Concluido = 'Concluído';
}
