#!/bin/bash
for file in `find . -name $1`;
do

  echo $(basename $file);
sudo mv $file $(dirname $file)/$2;

done
