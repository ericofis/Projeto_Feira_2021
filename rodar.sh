#!/bin/bash
IFS=$'\n'
i=1

clear

rm -rf config

while :
do

#if [ -f *.jpg ] ; then
if [[ $(ls *.jpg) ]]; then
   
for var1 in *.jpg ; do

    #mogrify -resize 1280x720 -gravity center -extent 1080x1080 ${var1}
       
    #python prog.py ${var1}
    
    #pdflatex -interaction=nonstopmode -halt-on-error ${var1} 
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
    
    mv *REMOVE_ME ./velhas

    
    rm -rf config
done



else 
    echo time
    echo "Aguardando imagens"
    sleep 3
fi

done







