function AfficherLesClients()
{
    $.ajax
    (
            {
              type:"get",
              url:"AfficherLesClients.php",
              data:"idActivite="+$('#lstActivites').val(),
              success: function(data)
              {
                  $('#divFormations').empty();
                  $('#divAgents').empty();
                  $('#divFormations').append(data);
              },
              error:function()
              {
                  alert("Erreur pour récupérer les formations");
              }
            }
    );
}