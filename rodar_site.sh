#!/bin/bash
IFS=$'\n'
i=1

clear

rm -rf config

while :
do

    ls *.jpg  -alt > lista-nova
    diff lista lista-nova
    if [ $? -ne 0 ]; then
    
        echo "Nova imagem detectada!";
        
        cat header > index.html
        
        for var1 in $(ls *.jpg -t ) ; do
        
            echo "<img src='" ${var1} "' alt='imagem' width='500' style='max-width: 100%' >" >> index.html
            echo "<br />" >> index.html

            if [ $? -eq 0 ] 
            then
                echo "****************************************************************"
                echo -e "Arquivo(${i}):" ${var1} "\033[32m OK \033[0m"
                echo "****************************************************************"        
            else
                echo "****************************************************************"
                echo -e "Arquivo(${i}):" ${var1} "\033[31m ERRO! \033[0m"
                echo "****************************************************************"
            fi
            i=$((${i}+1))
            
            if [ $i -eq 10 ]
            then
              break
            fi

        done
        
        mv lista-nova lista
        
        cat footer >> index.html
        
        git add . ; git commit -m "testenotebook" ; git push
    else 
        echo "Aguardando imagens"
        sleep 3
    fi

done







