# Teste para desenvolvedor Front-end

Para este teste, separamos alguns pontos que julgamos serem de extrema importância para a Tecnofit.
Abaixo, teremos algumas instruções, alguns cuidados e o objetivo do teste.

## Instruções

O relatório que deverá desenvolver é um relatório de aulas de cada professor.
Um professor pode ter diversas turmas e uma turma, diversas aulas.
Dentro de cada aula, existe os alunos, eles podem ser de diversos tipos, conforme informações complementares.

Na visualização inicial, o usuário verá somente os professores, suas turmas e suas aulas. Ao clicar na linha do evento, o detalhe contendo os alunos presentes naquela aula deverá ser exibido.

Leia atentamente as instruções antes de iniciar.

 - Baixe o repositório em sua máquina local;
 - Nele irá conter a estrutura básica do Angular;
 - Desenvolva as seguintes telas:
   - https://www.figma.com/file/dOIGoQJAf1L5pJIusnbU8rjD/Teste-Front?node-id=0%3A1
 - Crie as informações de algum modo na pasta API:
   - Pode ser no formato de sua preferência;
     - Ex.: API, JSON, etc;
   - Deverá listar as informações contidas no layout geral:
     - Professor
       - Turmas
         - Data da Aula
         - Horário da aula
         - Bloqueados
         - Agenda Fixa
         - Aula Avulsa
         - Reposição
         - Faltas
         - Prospect
         - Bolsistas
         - Total de alunos
   - Deverá listar as informações previstas no layout do detalhe:
     - Turma
     - Data da aula
     - Hora da aula
     - Alunos
       - Nome do aluno
       - Origem
       - Aparelho
       - Nome do Contrato
       - Inicio e Fim do Contrato
       - Tipo do Checkin
 - O clique na linha do evento no layout geral, abre o layout do detalhe;
 - O tipo de checkin deve ser atualizavel;

 - Filtros do relatório:
   - Periodo (considerar a data da aula, por default, o mês atual);
   - Tipo de checkin (por padrão trás todos);
   - Filtrar turmas (Caso queira visualizar somente uma turma especifica);
   - Filtrar professor (Caso queira visualizar um professor somente);
   - * Se filtrar uma turma, deve somente mostrar os professores que tem aquela turma no filtro de professor);
   - * Se filtrar um periodo, deve somente mostrar os professores que deram aula naquele periodo nos filtros);

## Informações complementares

 - Tipos de chekin:
   - Reposição
   - Aula avulsa
   - Agenda fixa
   - Prospect
   - Bolsista
   - Bloqueado
   - Faltas
 - Origens:
   - Aplicativo
   - Manual
   - Matricula
   - Automática

## Cuidados

Alguns cuidados devem ser tomados durante a execução do teste, veja abaixo quais são eles:

 - Tela deve ser criada em Lazy-load;
 - Carregamento dos itens conforme necessidade de exibição;
 - Clique na linha do evento abre os detalhes com as pessoas que estão naquele evento;

## Objetivo

Analisar as técnicas de desenvolvimento, qualidade do código e soluções de problemas.