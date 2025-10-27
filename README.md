# Carrinho de Compras para implementar o conteúdo abordado em design patterns. Aplicado a PSR-12 para melhor organização e construção do código
NOME: IGOR RAMOS, RA 1992632 | ISAQUE CASTRO, RA 1993141

## Estrutura 
```
carrinho/
├── src/
│   ├── Carrinho.php
│   ├── Stock.php
├── docs/
├── index.php
└── README.md
```

# Como executar pelo xampp
Extraia o conteúdo do projeto para a pasta `htdocs` do XAMPP, inicie o Apache no painel do XAMPP e acesse (http://localhost/carrinho/index.php). 

## Quais funcionalidades foram implementadas
 Listagem de produtos do estoque, adicionar itens ao carrinho, atualização de estoque após compra, exibição de itens do carrinho e subtotais, cálculo do valor total do carrinho.
 e funcionalidade de impar o carrinho.

## Todas as regras de Negócio
 Só é possível adicionar produtos existentes no estoque, quantidade deve ser maior que zero, não é permitido adicionar quantidade maior que a disponível em estoque e o estoque é decrementado automaticamente.

## Limitações
Estoque e carrinho ficam em memória, sem banco de dados, não há gerenciamento de usuários ou persistência.

## Exemplos de Uso   
 Adicionar 2x teclado (id 1), adicionar 1x placa de vídeo (id 4), tentar adicionar 25x SSD 240GB (id 9) → falha. Aplicação do cupom de desconto de 10%
