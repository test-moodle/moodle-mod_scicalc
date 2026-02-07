<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * scicalc.php
 *
 * @package   mod_scicalc
 * @copyright 2026 Eduardo Kraus {@link https://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['calculator_help'] = 'Digite uma expressão e pressione Enter ou "=".<br>Suportado:';
$string['calculator_title'] = 'Calculadora';
$string['clear_history'] = 'Limpar histórico';
$string['error_arity_mismatch'] = 'Quantidade de argumentos inválida.';
$string['error_factorial_overflow'] = 'Fatorial excedeu o limite numérico.';
$string['error_generic'] = 'Erro ao avaliar a expressão.';
$string['error_invalid_expression'] = 'Não consegui calcular porque a conta está escrita em um formato que a calculadora não reconhece (verifique parênteses, sinais e nomes como <code>sin</code>/<code>sqrt</code>).';
$string['error_invalid_factorial'] = 'Fatorial inválido.';
$string['error_invalid_number'] = 'Número inválido.';
$string['error_invalid_token_flow'] = 'Fluxo de tokens inválido.';
$string['error_mismatched_parentheses'] = 'Parênteses não correspondentes.';
$string['error_misplaced_comma'] = 'Vírgula em posição inválida.';
$string['error_negative_factorial'] = 'Não é possível calcular fatorial de número negativo.';
$string['error_non_finite_result'] = 'O resultado dessa conta deu infinito ou não é um número (NaN). Verifique se você não está dividindo por zero ou usando algo como raiz de número negativo.';
$string['error_non_integer_factorial'] = 'O fatorial só é definido para inteiros.';
$string['error_stack_underflow'] = 'Faltou um número ou um argumento. Ex: <code>+2</code>, <code>2*</code>, <code>2 + ( )</code>, <code>2 +</code>, <code>sin()</code> sem valor, <code>pow(2)</code> sem o argumento 2.';
$string['error_unclosed_function_call'] = 'Chamada de função não finalizada.';
$string['error_unexpected_token'] = 'Token inesperado.';
$string['error_unknown_identifier'] = 'Identificador desconhecido.';
$string['error_unknown_token'] = 'Token desconhecido.';
$string['error_unsupported_function'] = 'Função não suportada.';
$string['error_unsupported_operator'] = 'Operador não suportado.';
$string['error_zero_argument_function_call'] = 'Chamada de função sem argumentos.';
$string['history_title'] = 'Histórico';
$string['intro'] = 'Descrição';
$string['invalid_expression'] = 'Expressão inválida';
$string['modulename'] = 'Calculadora Científica';
$string['modulenameplural'] = 'Calculadoras Científicas';
$string['pluginadministration'] = 'Administração da Calculadora Científica';
$string['pluginname'] = 'Calculadora Científica';
$string['scicalc:addinstance'] = 'Adicionar uma nova Calculadora Científica';
$string['scicalc:view'] = 'Ver Calculadora Científica';
