#!/bin/bash
IFS=$'\n'

clear

while :
do

    ls *.jpg  -alt > lista-nova
    diff lista lista-nova
    if [ $? -ne 0 ]; then
    
        i=1
    
        echo "Nova imagem detectada!";
        
        cat header > index.html
         cat ../prog2/inicio > ../prog2/facebook.php
        for var1 in $(ls *.jpg -t ) ; do
        
            echo "<img src='" ${var1} "' alt='imagem' width='500' style='max-width: 100%' >" >> index.html
            echo "<br />" >> index.html
             if [ $i -eq 11 ]
            then
              echo "<img src='" ${var1} >> ../prog2/facebook.php
            fi
            
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
            
            if [ $i -eq 11 ]
            then
              break
            fi

        done
        
        mv lista-nova lista
        
        cat footer >> index.html
        cat ../prog2/final >> ../prog2/facebook.php
        git add . ; git commit -m "testenotebook" ; git push
    else 
        echo "Aguardando imagens"
        sleep 3
    fi

done







