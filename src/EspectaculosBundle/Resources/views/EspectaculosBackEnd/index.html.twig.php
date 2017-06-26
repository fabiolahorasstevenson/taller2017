{% extends 'base.html.twig' %}

{% block body %}
<!-- Armar Home -->
<!-- Crear un container -->
<div class="page-header">
  <h2>Espectáculos <small> Espectáculos </small></h2>
</div>
<div class="container">
	<!--{{ dump(espectaculos) }} -->
	{% for espectaculo in espectaculos %}
	<div class="media">
	  <div class="media-left">
	     <a href="{{ path('espectaculos_show', {'id': espectaculo.id}) }}">
	      <img class="media-object" style="width: 64px; height: 64px" src="{{ espectaculo.imagen}}" alt="Imágen del espectáculo" title="Ver detalle del espectáculo">
	    </a>
	  </div>
	  <div class="media-body">
	     <h4 class="media-heading"> {{ espectaculo.nombre }}</h4> 
	     {{ espectaculo.descripcion }} 
	    
	 </div>
  </div>
  {% endfor %}
</div>
{% endblock %}