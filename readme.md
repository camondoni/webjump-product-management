<h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="Desafio_Webjump_gerenciamento_de_produtos_0"></a>Desafio Webjump gerenciamento de produtos</h1>
<p class="has-line-data" data-line-start="1" data-line-end="2">Desafio proposto pela empresa Webjump  desenvolver um sistema de gerenciamento de produtos. Esse sistema será composto de um cadastro de produtos e categorias. Os requisitos desse sistema estão listados nos tópicos abaixo. Não existe certo ou errado, queremos saber como você se sai em situações reais como esse desafio.</p>
<h1 class="code-line" data-line-start=3 data-line-end=4 ><a id="Requisitos_3"></a>Requisitos</h1>
<ul>
<li class="has-line-data" data-line-start="4" data-line-end="5">O sistema deverá ser desenvolvido utilizando a linguagem PHP (de preferência a versão mais nova) ou outra linguagem se assim foi especificado para sua avaliação por nossa equipe.</li>
<li class="has-line-data" data-line-start="5" data-line-end="6">Você deve criar um CRUD que permita cadastrar as seguintes informações: Produto: Nome, SKU (Código), preço, descrição, quantidade e categoria (cada produto pode conter uma ou mais categorias)</li>
<li class="has-line-data" data-line-start="6" data-line-end="7">Categoria: Código e nome.</li>
<li class="has-line-data" data-line-start="7" data-line-end="9">Salvar as informações necessárias em um banco de dados (relacional ou não), de sua escolha</li>
</ul>
<h1 class="code-line" data-line-start=9 data-line-end=10 ><a id="Tecnologias_utilizadas_9"></a>Tecnologias utilizadas</h1>
<ul>
<li class="has-line-data" data-line-start="10" data-line-end="11">PHP 8.1</li>
<li class="has-line-data" data-line-start="11" data-line-end="12">Apache</li>
<li class="has-line-data" data-line-start="12" data-line-end="13">Docker compose</li>
<li class="has-line-data" data-line-start="13" data-line-end="14">MySQL 5.7</li>
<li class="has-line-data" data-line-start="14" data-line-end="15">Illuminate Database</li>
<li class="has-line-data" data-line-start="15" data-line-end="17">PHPUnit</li>
</ul>
<h1 class="code-line" data-line-start=17 data-line-end=18 ><a id="Pr_requisitos_17"></a>Pré requisitos</h1>
<ul>
<li class="has-line-data" data-line-start="18" data-line-end="19">Composer(“Não tive tempo de configurar o container do Docker para rodar o composer automático”)</li>
<li class="has-line-data" data-line-start="19" data-line-end="21">Docker compose ou ter um ambiente php a sua escolha(Apache, Nginx) e um banco de dados a sua escolha(MySQL, Postgres, SQLite, ou SQL Server)</li>
</ul>
<h1 class="code-line" data-line-start=21 data-line-end=22 ><a id="Instalao_21"></a>Instalação</h1>
<pre><code>Rodar os comandos
    composer install
    docker-compose build
    docker-compose up
Crie as tabelas(o SQL se encontra na raiz create_database.sql)
Caso esteja utilizando um ambiente sem o docker é nescessário alterar .env com as configurações do banco utilizado
</code></pre>
<h1 class="code-line" data-line-start=29 data-line-end=30 ><a id="Utilizao_29"></a>Utilização</h1>
<ul>
<li class="has-line-data" data-line-start="30" data-line-end="31">Para rodar os testes unitários rode o comando vendor/bin/phpunit tests/.</li>
<li class="has-line-data" data-line-start="31" data-line-end="33">Na pasta raiz está disponível o export do insomnia com todos os serviços</li>
</ul>
<h1 class="code-line" data-line-start=33 data-line-end=34 ><a id="Opcionais_realizados_33"></a>Opcionais realizados</h1>
<ul>
<li class="has-line-data" data-line-start="34" data-line-end="35">Gerar logs das ações ❌;</li>
<li class="has-line-data" data-line-start="35" data-line-end="36">Testes automatizados com informação da cobertura de testes(“Por questão de tempo não tive tempo de configurar o pipeline para rodar os testes automatizados”) ✅;</li>
<li class="has-line-data" data-line-start="36" data-line-end="38">Upload de imagem no cadastro de produtos (“Eu não fiz na criação do produto, criei um serviço só para fazer uploads de imagens e está gravando local, gostaria de ter utilizado o s3”) ✅;</li>
</ul>
<h1 class="code-line" data-line-start=38 data-line-end=39 ><a id="Observaes_38"></a>Observações</h1>
<ul>
<li class="has-line-data" data-line-start="40" data-line-end="41">Nos casos de uso faltou validar os registros que não foram encontrados devolvendo 404 no PUT e no DELETE</li>
<li class="has-line-data" data-line-start="41" data-line-end="42">Gostaria de ter utilizado alguma ferramenta para fazer injeção das dependecias;</li>
<li class="has-line-data" data-line-start="42" data-line-end="43">Não foi utilizado os assets que foram disponibilizados;</li>
<li class="has-line-data" data-line-start="43" data-line-end="44">O GIT utilizei apenas um branch para ter mais agilidade, mas no dia a dia da empresa iria utilizar git flow;</li>
<li class="has-line-data" data-line-start="44" data-line-end="46">Teve algumas coisas que não fiz devido a tempo, como realizar mais alguns testes, criar classes de excessão e ajustar o serviço de criar produtos para receber imagens;</li>
</ul>
<h1 class="code-line" data-line-start=46 data-line-end=47 ><a id="Me_ajude_a_melhorar__46"></a>Me ajude a melhorar !</h1>
<p class="has-line-data" data-line-start="48" data-line-end="49">Qualquer sugestão de melhoria, correção de algum erro que tenha feito seja algum principio de SOLID violado, algum erro de negócio ou qualquer feedback é importante mesmo que eu não passe no desafio ! obrigado !!</p>
