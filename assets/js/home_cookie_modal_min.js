$(function(){$('#userAuthorizationModal').modal({backdrop:'static',keyboard:!1}),localStorage.getItem('storageAuthorization')?$('#userAuthorizationModal').modal('hide'):$('#userAuthorizationModal').modal('show'),localStorage.getItem('analyticsAuthorization')&&$('#analytics').attr('checked','checked'),$('#storageDecline').click(function(){location.href='https://www.google.com/'}),$('#storageAllow').click(function(){!0===document.getElementById('analytics').checked&&localStorage.setItem('analyticsAuthorization','true')})});