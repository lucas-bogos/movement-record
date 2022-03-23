<?php

declare(strict_types=1);

namespace Source\Application\Messages;

class ResumeMovement
{
  static public function depositMessage($name, $type, $value, $balanceNow)
  {
    echo '
      <div 
        style="
          background: #abebd2; 
          color: #012F1E; 
          width: 100%; 
          height: 60px; 
          margin: 1em 0;
          display: flex;
          align-items: center;
          justify-content: center;
      ">' . $name . ', os seus dados foram atualizados com exito!</div>
    ';
    echo "
    <h2>Resumo de movimentação</h2>
    <div>
      <ul>
        <li>Tipo de conta: $type</li>
        <li>Valor depositado: R$ $value,00</li>
        <li>Saldo atual: R$ $balanceNow,00</li>
      </ul>
    </div>
  ";
  }
  static public function withdrawMessage($name, $type, $value, $balanceNow)
  {
    echo '
      <div 
        style="
          background: #abebd2; 
          color: #012F1E; 
          width: 100%; 
          height: 60px; 
          margin: 1em 0;
          display: flex;
          align-items: center;
          justify-content: center;
      ">' . $name . ', os seus dados foram atualizados com exito!</div>
    ';
    echo "
      <h2>Resumo de movimentação</h2>
      <div>
        <ul>
          <li>Tipo de conta: $type</li>
          <li>Valor sacado: R$ $value,00</li>
          <li>Restou: R$ $balanceNow,00</li>
        </ul>
      </div>
    ";
  }
}
