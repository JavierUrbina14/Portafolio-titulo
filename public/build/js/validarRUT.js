function checkRut(e){var l=e.value.replace(".","");if(l=l.replace("-",""),cuerpo=l.slice(0,-1),dv=l.slice(-1).toUpperCase(),e.value=cuerpo+"-"+dv,cuerpo.length<7)return e.setCustomValidity("RUT Incompleto"),!1;for(suma=0,multiplo=2,i=1;i<=cuerpo.length;i++)index=multiplo*l.charAt(cuerpo.length-i),suma+=index,multiplo<7?multiplo+=1:multiplo=2;if(dvEsperado=11-suma%11,dv="K"==dv?10:dv,dv=0==dv?11:dv,dvEsperado!=dv)return e.setCustomValidity("RUT Inválido"),!1;e.setCustomValidity("")}