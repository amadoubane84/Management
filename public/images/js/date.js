var debut= document.getElementById('gestion_Date_debut');
var fin=document.getElementById('gestion_Date_fin');
var duree=document.getElementById('gestion_Duree');
var days=1000*60*60*24;
var diff= new Date(fin.value)-new Date(debut.value);
duree.value=Math.floor(diff/days)+ " jours";
console.log(duree.value);
debut.addEventListener('blur',function(){
        var diff= new Date(fin.value)-new Date(debut.value);
        duree.value=Math.floor(diff/days)+ " jours";
});
fin.addEventListener('blur',function(){
        var diff= new Date(fin.value)-new Date(debut.value);
        duree.value=Math.floor(diff/days)+ " jours";
});


