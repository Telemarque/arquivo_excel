<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arquivos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('instituicao_id')->unsigned()->nullable();
            $table->enum('status', ['ATIVO', 'INATIVO', 'EXCLUIDO'])->default('ATIVO')->nullable();
            $table->string('matricula',7)->unique();
            $table->string('nome');
            $table->enum('sexo', ['MASCULINO', 'FEMININO', 'N/I'])->default('N/I');
            $table->string('cpf')->unique();
            $table->double('percentual_da_contribuicao',5,2)->nullable();
            $table->string('cnpj')->unique()->nullable();
            $table->string('valor_contribuicao')->nullable();
            $table->string('codigo_banco')->nullable();
            $table->string('banco')->nullable();
            $table->string('agencia')->nullable();
            $table->string('digito_agencia')->nullable();
            $table->string('conta_corrente')->unique()->nullable();
            $table->string('digito_conta_corrente')->nullable();
            $table->date('data_de_nascimento');
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->integer('melhor_dia')->nullable();
            $table->string('complemento')->nullable();
            $table->string('tipo_de_processamento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('cep')->nullable();
            $table->string('tel_residencial')->nullable();;
            $table->string('tel_celular')->nullable();;
            $table->string('email')->unique();
            $table->boolean('aposentado')->default(false);
            $table->boolean('representante')->default(false);
            $table->text('obs_relacionamento')->nullable();
            $table->string('motivo_da_exclusao')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('instituicao_id')->references('id')->on('instituicoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arquivos');
    }
}
