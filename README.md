# Modulo Teste Amaggi

Esse módulo insere um elemento na homepage padrão do Magento 2, tema Luma, que tem por 
objetivo exibir uma caixa com único produto em destaque, juntamente com seu estoque disponível 
sendo atualizado em tempo real


# Requisitos 

- 2.4.6 Open Source com tema Luma
- Habilitar 'Anonymous Guest Acess' (Painel Admin > Store > Configuration > Services > Magento Web Api > Web API Security > Allow Anonymous Guest Access = YES) 

# Instalação

- Faça o clone do respositorio com `git clone https://github.com/RaphaelAntunes/Amaggi_Teste.git`
- Dentro da pasta Amaggi_Teste copie o diretorio Antunes
- Insira o diretorio dentro de seu projeto magento na pasta app/code
- O Diretorio deve ficar como app/code/Antunes/teste
- Após isso atualize seu projeto com bin/magento setup:upgrade
- Work !

# Utilização

- A escolha do produto para destaque fica no painel do magento admin com o caminho
Painel Admin > Store > Configuration. Nas abas procure pela coluna ANTUNES > TESTE e após isso Geral > Selecione um produto.


# Habilitando e Desabilitando o modulo
- Habilitar Modulo: bin/magento module:enable Antunes_teste && bin/magento setup:upgrade
- Desabilitar Modulo: bin/magento module:disable Antunes_teste && bin/magento setup:upgrade


OBS: O Modulo só funciona se houver um produto selecionado.
