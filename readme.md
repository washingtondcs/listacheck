<img src="https://cloud.githubusercontent.com/assets/17282308/21560764/ebd79726-ce4a-11e6-8007-823fcac7a16b.png" width="22%"></img> 
##Sistema de Controle de Tarefas

#1 MOTIVAÇÃO#

Este sistema web foi desenvolvido entre os dias 27 e 29 de dezembro de 2016 por mim, Washington da Costa Silva. E sua principal finalidade é servir como quesito de avaliação ao processo seletivo do cargo de Programador PHP Júnior, processo esse, promovido pelo órgão estadual Funceme - Fundação Cearense de Meteorologia e Recursos Hídricos. Nesta fase do processo de seleção, o desafio era criar uma aplicação web simples de gerenciamento de tarefas, no estilo to-do list.

Requisitos básicos do projeto:
- a) Persistência dos registros em arquivo.
- b) Criação de tarefas no sistema.
- c) Visualizar a lista de tarefas.
- d) Marcar como feita (concluída), as tarefas.
- e) Editar tarefa.
- f) Deletar tarefa.

Foi permitida a utilização de frameworks de back-end e front-end para o desenvolvimento do projeto.


#2 SOBRE A APLICAÇÃO DESENVOLVIDA#

Foi utilizada a linguagem de programação PHP, juntamente com os frameworks de front-end: Bootstrap v3.3.7(última versão disponível) e back-end CodeIgniter v3.1.2 (última versão disponível), aliados ao uso da linguagem de marcação de folhas de estilos CSS 3, HTML5, além do uso de trechos em JQuery. O layout da aplicação levou em consideração o conceito de mobile-first, já primariamente dotado pelo framework bootstrap, assim como a diagramação das páginas através do sistema de grids adotado pelo mesmo. Tornando assim o sistema responsivo e adaptado aos mais variados tamanhos de resolução. Através do CodeIgniter foi utilizado o padrão de arquitetura MVC (Model-View-Controler) para a entidade tarefas. O arquivo com os registros realizados pelo sistema pode ser encontrado dentro do diretório raiz da aplicação dados/registros.db, as demais pastas principais estão na pasta application (ex: controllers,models e views).

#2.1 Sobre as funcionalidades#

O acesso as funcionalidades principais do sistema é provido através da view tarefas/index, como: adicionar, listar, marcar como concluída, excluir, editar. A view editar trata do formuláio de edição da tarefa e também pode ser utilizada para marcar a tarefa como concluída, no entanto, é através de seu uso o único modo de reabrir a tarefa como não concluída, desmarcando o checkbox concluído. Caso a tarefa seja finalizada através do painel de Ações da view principal tarefas/index, o botão de finalizar tarefa será desabilitado para aquela tarefa especifica.

#2.1.1 Funcionalidades Adicionais#

Foram adicionadas algumas funcionalidades como geração de relatórios de tarefas, demonstrando o uso de responsive utilities do framework Bootstrap, no qual é possível diferenciar as informações que serão usadas em momento de impressão e as informações visualizadas em tela. Otra funcionalidade é o status de tarefas, gerando uma janela modal que apresenta o status em percentual de tarefas concluídas e não concluídas conforme o total de tarefas cadastradas. Foi inserido um contador de registros para as tarefas cadastrados.

#3 LOGOMARCA FICTÍCIA#

Para o desenvolvimento do projeto foi criada uma marca fictícia ListaCheck, apenas para identificar o projeto e ilustrar algumas funcionalidades de responsividade com imagens, sendo a mesma de minha autoria. Para tanto foi utilizado o software Corel DrawX8 (Última versão disponível), sobre a licença de avaliação gratuita de 30 dias

#4 CONSIDERAÇÕES#

No mais, espero ter atendido as expectativas e requisitos do projeto. Quero dizer que me diverti ao produzi-lo.

_**Buscando sempre a satisfação de vencer desafios, encontrei na área de T.I. a minha vocação para contribuir com a sociedade de forma plena e objetiva.**_


<right>Washington da Costa Silva</right>
