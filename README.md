# Desafio Gente que Soma 1ª Edição

Chegou a hora do desafio! Esta é uma etapa muito importante para a sua seleção na 1ª edição do Programa Gente Que Soma.

## Sobre o desafio

Vamos analisar a estratégia utilizada por você para resolvê-lo, bem como a forma de organização e representação. As informações no código-fonte ficam sob sua responsabilidade.

Abaixo são listadas as linguagens permitidas para este desafio:

- C#
- Java
- PHP
- Javascript e derivados

## O Problema

### Diamantes

Dado uma letra ('A' a 'Z'), exiba um diamante iniciando em 'A' e tendo a letra fornecida com o ponto mais distante.

Por exemplo, dado a letra 'E' temos:

```text
    A
   B B
  C   C
 D     D
E       E
 D     D
  C   C
   B B
    A
```

Dado a letra 'C' temos:

```text
  A
 B B
C   C
 B B
  A
```

### Incremento

Também é necessário criar um incremento adicional ao desafio, podendo ser qualquer funcionalidade que agregue na experiência do usuário.

Desafio retirado do site.
<http://dojopuzzles.com/problemas/exibe/diamantes/>

---

## A Resolução

Foi utilizada a linguagem **PHP** para criar o algorítmo que desenha o diamante.

Chama a função que desenha o diamante:

```php
function drawDiamont ($letter) {
  echo strtoupper($letter) == 'A'
    ? 'A'
    : drawRecDiamont("\n", strtoupper($letter), 'A', ord(strtoupper($letter))-ord('A'), -1, true);
}
```

Função que desenha o diamante recursivamente:

```php
function drawRecDiamont($diamont, $letter, $currentLetter, $leftSpace, $innerSpace, $topSide) {
  if($innerSpace > 0) {
    $diamont .= str_repeat(" ", $leftSpace) . $currentLetter . str_repeat(" ", $innerSpace) . $currentLetter . "\n";
  } else {
    $diamont .= str_repeat(" ", $leftSpace) . $currentLetter . "\n";
  }
  if ($topSide) {
    if ($letter != $currentLetter) {
      return drawRecDiamont($diamont, $letter, chr(ord($currentLetter)+1), $leftSpace - 1, $innerSpace + 2, true);
    } else {
      return drawRecDiamont($diamont, $letter, chr(ord($currentLetter)-1), $leftSpace + 1, $innerSpace - 2, false);
    }
  } else {
    if ($currentLetter != 'A') {
      return drawRecDiamont($diamont, $letter, chr(ord($currentLetter)-1), $leftSpace + 1, $innerSpace - 2, false);
    } else {
      return $diamont;
    }
  }
}
```

Para fazer a funcionalidade que agrega na experiência do usuário foi utilizado **HTML**, **CSS** e **JavaScript**, criando uma interface que aguarda o usuário clicar em qualquer letra em seu teclado para desenhar um novo diamante.

Ao entrar:

![print1](screenshots/print1.png)

Ao pressionar a tecla "F":

![print2](screenshots/print2.png)

Ao pressionar a tecla "M":

![print3](screenshots/print3.png)

Ao pressionar a tecla "Z":

![print4](screenshots/print4.png)
