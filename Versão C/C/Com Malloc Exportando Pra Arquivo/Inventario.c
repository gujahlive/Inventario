#include <stdio.h>
#include <stdlib.h>
#include<locale.h>
#include<string.h>
#include<ctype.h>
void CriarAbrirArquivoTudo(FILE **arq) {

   *arq = fopen("CadastrosInventario.txt","rb+");
   if (*arq == NULL) {
      *arq = fopen("CadastrosInventario.txt","wb+");
   }
}

void FecharArquivoTudo(FILE *arq) {
   fclose(arq);
}


typedef struct{
	char nome[41],email[41],cargo[41],setor[41],excluido,marcaCelular[41],modeloCelular[41],marcaComp[41],modeloComp[41],mac[18];
	int dtCompraCelular,dtCompraComp,dtEntregueCelular,dtEntregueComp;
	//float precoCelular,precoComp;
	int ip,telefone,cpf,rg,quantidade,numeroOperadora,imei;
}CadTudo;



void listaTudo(FILE *arqT){
	system("cls");
	CadTudo cadastros;
	printf("\t\t\t\t\t\t\tUsuários cadastrados:\n\n\n\n");
	fseek(arqT, 0, SEEK_SET);
   	fread(&cadastros, sizeof(CadTudo), 1, arqT);
   	while ( !  feof(arqT)) {
      	if(cadastros.excluido=='N'){
      	printf("\t\t\t\t\tFUNCIONÁRIO\n\n");
      	printf("Nome completo: %s -- RG: %d -- CPF: %d -- Setor: %s -- Cargo: %s -- Email Corporativo: %s\n",cadastros.nome,cadastros.rg,cadastros.cpf,cadastros.setor,cadastros.cargo,cadastros.email);
      	printf("CELULAR CORPORATIVO || Marca: %s -- Modelo: %s -- IMEI: %d -- Número da Operadora: %d -- Data De Compra: %d -- Data De Entrega Ao Funcionário: %d\n",cadastros.marcaCelular,cadastros.modeloCelular);
      	printf("COMPUTADOR CORPORATIVO || Marca: %s -- Modelo: %s -- MAC: %s -- Data De Compra: %d -- Data De Entrega Ao Funcionário: %d\n",cadastros.marcaComp,cadastros.modeloComp,cadastros.mac,cadastros.dtCompraComp,cadastros.dtEntregueComp);
      	printf("================================================================================================================================================\n\n");
      	
      
	  
	  }
      fread(&cadastros, sizeof(CadTudo), 1, arqT);
   }

}


void buscarCad(FILE *arqT,int cpfBusca){
	system("cls");
	CadTudo cadastros;
	fseek(arqT, 0, SEEK_SET);
   	fread(&cadastros, sizeof(CadTudo), 1, arqT);
   	while ( !  feof(arqT)) {
      	if(cadastros.excluido=='N' && cadastros.cpf == cpfBusca){
      	printf("\t\t\t\t\tFUNCIONÁRIO ENCONTRADO\n\n");
      	printf("Nome completo: %s -- RG: %d -- CPF: %d -- Setor: %s -- Cargo: %s -- Email Corporativo: %s\n",cadastros.nome,cadastros.rg,cadastros.cpf,cadastros.setor,cadastros.cargo,cadastros.email);
      	printf("CELULAR CORPORATIVO || Marca: %s -- Modelo: %s -- IMEI: %d -- Número da Operadora: %d -- Data De Compra: %d -- Data De Entrega Ao Funcionário: %d\n",cadastros.marcaCelular,cadastros.modeloCelular);
      	printf("COMPUTADOR CORPORATIVO || Marca: %s -- Modelo: %s -- MAC: %s -- Data De Compra: %d -- Data De Entrega Ao Funcionário: %d\n",cadastros.marcaComp,cadastros.modeloComp,cadastros.mac,cadastros.dtCompraComp,cadastros.dtEntregueComp);
      	printf("================================================================================================================================================\n\n");
      	
      
	  
	  }
      fread(&cadastros, sizeof(CadTudo), 1, arqT);
   }

}





void CadastraTudo(FILE *arqT){
	CadTudo cadastro;
	char celCorp,compCorp;
	
	printf("\t----Cadastro Funcionário---\n");
	fflush(stdin);
				printf("Nome: ");
				gets(cadastro.nome);
				fflush(stdin);
				printf("RG: ");
				scanf("%d",&cadastro.rg);
				printf("CPF: ");
				scanf("%d",&cadastro.cpf);
				fflush(stdin);
				printf("Setor: ");
				gets(cadastro.setor);
				fflush(stdin);
				printf("Cargo: ");
				gets(cadastro.cargo);
				printf("Email Corporativo: ");
				gets(cadastro.email);
				printf("\n\nPossui celular corporativo? S=SIM ou N=NÃO: ");
				scanf("%c",&celCorp);
				fflush(stdin);
				if(celCorp == 's'){
					fflush(stdin);
						printf("\t----Cadastro Celular Corporativo---\n");
						printf("Marca: ");
						gets(cadastro.marcaCelular);
						printf("Modelo: ");
						gets(cadastro.modeloCelular);
						fflush(stdin);
						printf("IMEI: ");
						scanf("%d",&cadastro.imei);
						fflush(stdin);
						printf("Numero de operadora vinculado: ");
						scanf("%d",&cadastro.numeroOperadora);
						printf("Data de compra: ");
						scanf("%d",&cadastro.dtCompraCelular);
						fflush(stdin);
						printf("Data entregue ao funcionário: ");
						scanf("%d",&cadastro.dtEntregueCelular);
					//	printf("Preco: ");
					//	gets(cadastro.cpf);
						fflush(stdin);
							
				}
				fflush(stdin);
				printf("\n\nPossui computador corporativo? S=SIM ou N=NÃO: ");
				scanf("%c",&compCorp);
				fflush(stdin);
				if(compCorp == 's'){
					fflush(stdin);
						printf("\t----Cadastro Computador Corporativo---\n");
						printf("Marca: ");
						gets(cadastro.marcaComp);
						printf("Modelo: ");
						gets(cadastro.modeloComp);
						fflush(stdin);
						printf("MAC: ");
						gets(cadastro.mac);
						fflush(stdin);
						printf("Data de compra: ");
						scanf("%d",&cadastro.dtCompraComp);
						fflush(stdin);
						printf("Data entregue ao funcionário: ");
						scanf("%d",&cadastro.dtEntregueComp);
						fflush(stdin);
						//printf("Preco: ");
						//gets(cadastro.cpf);
										
				}
				
				printf("\t---- Cadastrado ---\n");
	
	cadastro.excluido='N';
 	fseek(arqT, 0, SEEK_END);
    fwrite(&cadastro, sizeof(CadTudo), 1, arqT);


}


main(){
	
	setlocale(LC_ALL,"Portuguese");
	int escolha,cpfFunc;
	FILE  *arqT;
	CriarAbrirArquivoTudo(&arqT);
	CadTudo *cadastro,*busca,*editar;
    //int   opcao,menu,ip,cpf,excluiUser,excluiMaquina,cpfM,macM;

	
	do{
	    printf("\n\n\t\tBem vindo ao INVENTÁRIO ACQUA PRODUCTS\n\n\n\n");
		printf("1- Cadastrar\n");
		printf("2- Listar\n");
		printf("3- Buscar\n");
		printf("4- Editar\n");
		printf("5- Sair\n\n\n\n");
		printf("\t\t\t\t\t\t\t\t\t\tCreated By: Gustavo Ferreira  ©\n");
		printf("Escolha: ");
		scanf("%d",&escolha);
		switch(escolha){
			case 1: 
			system("cls");
			CadastraTudo(arqT);	
			break;
			
			case 2: listaTudo(arqT); break;
			
			case 3:
			printf("Digite o CPF do funcionário para a busca: ");
			scanf("%d",&cpfFunc); 
			buscarCad(arqT,cpfFunc);
			break;
			
			case 4: system("cls");
			break;
			
			
		}
		
			
		
		
	}while(escolha != 5);
	
 	FecharArquivoTudo(arqT);
	system("pause");	
}
