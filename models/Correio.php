<?php 

class Correio {

	public $Retorno;

  #Pesquisa de preço e prazo de encomendas do correio
  public function pesquisaPrecoPrazo($CepOrigem,$CepDestino,$Peso,$Formato,$Comprimento,$Altura,$Largura,$MaoPropria,$ValorDeclarado,$AvisoRecebimento,$Codigo,$Diametro)
	{
		$dados = [];

    $Url="http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem={$CepOrigem}&sCepDestino={$CepDestino}&nVlPeso={$Peso}&nCdFormato={$Formato}&nVlComprimento={$Comprimento}&nVlAltura={$Altura}&nVlLargura={$Largura}&sCdMaoPropria={$MaoPropria}&nVlValorDeclarado={$ValorDeclarado}&sCdAvisoRecebimento={$AvisoRecebimento}&nCdServico={$Codigo}&nVlDiametro={$Diametro}&StrRetorno=xml&nIndicaCalculo=3";
    $this->Retorno=simplexml_load_string(file_get_contents($Url));

    $dados['valor'] = $this->Retorno->cServico->Valor;
    $dados['prazo'] = $this->Retorno->cServico->PrazoEntrega;
    
    echo json_encode($dados);
  }
}