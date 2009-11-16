
-----------------------------------------------------------------------------
-- cadastro
-----------------------------------------------------------------------------

DROP TABLE "cadastro" CASCADE;


CREATE TABLE "cadastro"
(
	"id" serial  NOT NULL,
	"nome" VARCHAR(255)  NOT NULL,
	"cpf" VARCHAR(15)  NOT NULL,
	"email_pessoal" VARCHAR(255),
	"email_profissional" VARCHAR(255)  NOT NULL,
	"municipio" VARCHAR(255)  NOT NULL,
	"telefone" VARCHAR(15)  NOT NULL,
	"validado" BOOLEAN default 'f' NOT NULL,
	"logradouro" VARCHAR(255)  NOT NULL,
	"bairro" VARCHAR(255)  NOT NULL,
	"numero" INTEGER default 0 NOT NULL,
	"complemento" VARCHAR(255),
	"estado" VARCHAR(2)  NOT NULL,
	"cep" VARCHAR(9)  NOT NULL,
	"created_at" TIMESTAMP,
	"celular" VARCHAR(255),
	"instituicao_trabalho" VARCHAR(255),
	"profissao" VARCHAR(255)  NOT NULL,
	"opcao_1_oficina" INTEGER,
	"opcao_2_oficina" INTEGER,
	"sexo" BOOLEAN,
	PRIMARY KEY ("id"),
	CONSTRAINT "cadastro_cpf_key" UNIQUE ("cpf"),
	CONSTRAINT "cadastro_email_profissional_key" UNIQUE ("email_profissional")
);

COMMENT ON TABLE "cadastro" IS '';


SET search_path TO public;