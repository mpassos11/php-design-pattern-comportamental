<?php

require 'vendor/autoload.php';

use Alura\DesignPattern\{AcoesAoGerarPedido\CriarPedidoNoBanco,
	AcoesAoGerarPedido\EnviarPedidoPorEmail,
	AcoesAoGerarPedido\LogGerarPedido,
	GerarPedido,
	GerarPedidoHandler};

$valorOrcamento = $argv[1];
$numeroDeItens = $argv[2];
$nomeCliente = $argv[3];

$gerarPedido = new GerarPedido($valorOrcamento, $numeroDeItens, $nomeCliente);
$gerarPedidoHandler = new GerarPedidoHandler();

$gerarPedidoHandler->addAcaoAoGerarPedido(new CriarPedidoNoBanco());
$gerarPedidoHandler->addAcaoAoGerarPedido(new EnviarPedidoPorEmail());
$gerarPedidoHandler->addAcaoAoGerarPedido(new LogGerarPedido());
$gerarPedidoHandler->execute($gerarPedido);
