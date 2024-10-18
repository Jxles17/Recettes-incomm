var refresh_req;
	if (window.XMLHttpRequest)
	{ // Mozilla, Safari, IE7 ...
		refresh_req = new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{ // Internet Explorer 6
		refresh_req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var wait = false;
	
	function ajoutObjet(id)
	{
		if(wait == false) // si ajout objet en cours : pas d'autres ajout objet
		{
			$.ajax(
				{
					beforeSend:function()
					{
						wait = true;
					},
					success: function() 
					{
						refresh_req.open('GET', 'wp-content/themes/rousselet/refresh_panier.php?prod='+id+'&qteajout='+($('#qte'+id+'').val()), true);
						refresh_req.send(null);
						refresh_req.onreadystatechange = handleAJAXReturn;
						if($('#qte'+id+'').val() > 1 )
						{
						TINY.box.show({html:'<p align="center">Les produits <br>ont été ajoutés au panier<br><br><a href="?page_id=73" class="titrepanier3">voir le panier</a></p>',animate:false,close:true,true:false,boxid:'success',autohide:4, top:120,width:250});
						
						}
						else
						{
						TINY.box.show({html:'<p align="center">Le produit <br> a été ajouté au panier<br><br><a href="?page_id=73" class="titrepanier3">voir le panier</a></p>',animate:false,close:true,mask:true,boxid:'success',autohide:4, top:120,width:250});
						}
						
						wait = false;
					}
				});
		}
	
	}
	
	function handleAJAXReturn()
	{
		if (refresh_req.readyState == 4)
		{
			if (refresh_req.status == 200)
			{
				document.getElementById('valeurpanier').innerHTML = refresh_req.responseText;
			}
			else
			{
				//alert('Erreur');
			}
		}
	}