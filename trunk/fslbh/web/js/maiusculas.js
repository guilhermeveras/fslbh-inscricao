 function maiuscula(id){
        /* 
         * Função transforma as primeiras letras de cada palavra digitada em Maiúscula
         */
        var palavras = document.getElementById(id).value; //pega o valor do input
       // var palavras =  $(id).getValue();
        
        palavras = palavras.split(""); //separa o mesmo em palavras
        var tmp="";
        
        //altera o vetor de palavras
        for(i=0; i < palavras.length; i++)
        { 
        	//percore as palavras
            if(palavras[i-1])
            {
                if(palavras[i-1] == " ")
                {
                	palavras[i] = palavras[i].replace(palavras[i],palavras[i].toUpperCase());
                }
                else 
                {
                	palavras[i] = palavras[i].replace(palavras[i], palavras[i].toLowerCase());
                }
            }
            else
            {
            	palavras[i]=palavras[i].replace(palavras[i],palavras[i].toUpperCase());
            }
            tmp += palavras[i];
        }
        tmp = tmp.replace(' Da ',' da ');
        tmp = tmp.replace(' De ',' de ');
        tmp = tmp.replace(' Di ',' di ');
        tmp = tmp.replace(' Do ',' do ');
        
        tmp = tmp.replace(' Das ',' das ');
        tmp = tmp.replace(' Des ',' des ');
        tmp = tmp.replace(' Dis ',' dis ');
        tmp = tmp.replace(' Dos ',' dos ');
        
        
        tmp = tmp.replace(' A ',' a ');
        tmp = tmp.replace(' E ',' e ');
        tmp = tmp.replace(' I ',' i ');
        tmp = tmp.replace(' O ',' o ');
        tmp = tmp.replace(' U ',' u ');
        
        document.getElementById(id).value = tmp;
        //$(id).setValue(tmp);
    }
 