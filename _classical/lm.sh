#!/bin/sh

base=1506021212

for i in ????.md;
do
	o=`grep ^order $i | cut -f2 -d:`
	lm=`expr $base + \( $o \* 90000 \)`
#	n=`echo $i | sed -e "s/[^0-9]\+//"`
	d=`date -I --date=@$lm`
	#echo $i $d
	sed -i -e "/^order/ilastmod: $d" $i
	#echo $i $lm
done
