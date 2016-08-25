// JavaScript Document

function deleteone () {
  return confirm("Do you really want to delete the record?");
}


function SearchButton() {
	
var  svalue = document.form1.keyString.value;

if(svalue=='') {

svalue = ' ';
	
}

showValue(svalue,'Sort Z to A');

	
}


function Orderby(value) {
	
var  skey = document.form1.keyString.value;

	if(value == 'Sort A to Z') {
	
	document.form1.asc.value = 'Sort Z to A';
		
	} else if (value == 'Sort Z to A') {
		
	document.form1.asc.value = 'Sort A to Z';
		
	}


if(skey=='') {

skey = ' ';
	
}

showValue(skey,value);
	
}