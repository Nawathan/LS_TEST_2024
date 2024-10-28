function uploadFile(fileInput, folder_name, file_name) {
    // folder_name = "linkservice_system/tech_job_upload";
    var serverRelativeUrlToFolder = '/sites/Dev/shared documents/'+folder_name;

    // var fileInput = jQuery('#imageUpload');
    var newName = file_name;
    var serverUrl = "https://wtccomputer.sharepoint.com/sites/Dev";
    var getFile = getFileBuffer();
    getFile.done(function (arrayBuffer) {
      var addFile = addFileToFolder(arrayBuffer);
      addFile.done(function (file, status, xhr) {
        var getItem = getListItem(file.d.ListItemAllFields.__deferred.uri);
        getItem.done(function (listItem, status, xhr) {
          var changeItem = updateListItem(listItem.d.__metadata);
          changeItem.done(function (data, status, xhr) {
            alert('file uploaded and updated');
          });
          changeItem.fail(onError);
        });
        getItem.fail(onError);
      });
      addFile.fail(onError);
    });
    getFile.fail(onError);

    function getFileBuffer() {
      var deferred = jQuery.Deferred();
      var reader = new FileReader();
      reader.onloadend = function (e) {
        deferred.resolve(e.target.result);
      }
      reader.onerror = function (e) {
        deferred.reject(e.target.error);
      }
      reader.readAsArrayBuffer(fileInput[0].files[0]);
      return deferred.promise();
    }

    function addFileToFolder(arrayBuffer) {
      var parts = fileInput[0].value.split('\\');
      var fileName = parts[parts.length - 1];

      var fileCollectionEndpoint = serverUrl+"/_api/web/getfolderbyserverrelativeurl('"+serverRelativeUrlToFolder+"')/files" +
              "/add(overwrite=true, url='"+fileName+"')";
      return jQuery.ajax({
          url: fileCollectionEndpoint,
          type: "POST",
          data: arrayBuffer,
          processData: false,
          headers: {
            "accept": "application/json;odata=verbose",
            "Content-Type": "application/json;odata=verbose",
            "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6IjJaUXBKM1VwYmpBWVhZR2FYRUpsOGxWMFRPSSIsImtpZCI6IjJaUXBKM1VwYmpBWVhZR2FYRUpsOGxWMFRPSSJ9.eyJhdWQiOiIwMDAwMDAwMy0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDAvd3RjY29tcHV0ZXIuc2hhcmVwb2ludC5jb21AZTk5ZmJhYTMtYjdmYy00OTc2LWE5ODgtODEzOGNiMmQ0Zjg5IiwiaXNzIjoiMDAwMDAwMDEtMDAwMC0wMDAwLWMwMDAtMDAwMDAwMDAwMDAwQGU5OWZiYWEzLWI3ZmMtNDk3Ni1hOTg4LTgxMzhjYjJkNGY4OSIsImlhdCI6MTY1OTUxNDY5OCwibmJmIjoxNjU5NTE0Njk4LCJleHAiOjE2NTk2MDEzOTgsImlkZW50aXR5cHJvdmlkZXIiOiIwMDAwMDAwMS0wMDAwLTAwMDAtYzAwMC0wMDAwMDAwMDAwMDBAZTk5ZmJhYTMtYjdmYy00OTc2LWE5ODgtODEzOGNiMmQ0Zjg5IiwibmFtZWlkIjoiYjU0N2ZkZGMtY2JkNS00ZTAwLWExNWQtZGVkYTMzZTczMzI4QGU5OWZiYWEzLWI3ZmMtNDk3Ni1hOTg4LTgxMzhjYjJkNGY4OSIsIm9pZCI6IjY3YzYwNDIwLWY4MzctNGQ1ZC1hNjU1LTA2OGI2MDU4ZWI3NSIsInN1YiI6IjY3YzYwNDIwLWY4MzctNGQ1ZC1hNjU1LTA2OGI2MDU4ZWI3NSIsInRydXN0ZWRmb3JkZWxlZ2F0aW9uIjoiZmFsc2UifQ.og2dVJFU6ZUZtsTeMTBgpvVS6fPs5o0Hie6ujFG5djJygT9R9izTTesGrGIrRDvqSCm4hgRSmyzCImUyEcsPaaV-I4sq5R-8AlI_CWnCffQVlUmeYh0HxUjYlhJjxQCVFuosLmy4yY4VxVLjXjO05HWKJ-qbufdFAbzftBxseYEeA2LCDljy_hCXRPPQMEZ5QIl1FupwkjVx84mhKo7OXkLufjl6mzdLTkk9Pz7S7Un9pL3r11kvi6qQOint6xE375KJ74lf3XgU7XMpjGGvXAeMhVj4rewsMXX_ABEPZONty0Rk5QLiNnDXquCZ_oXfo9nQjKIk1XrH4S6b3RdoxA",
            "X-RequestDigest": jQuery("#__REQUESTDIGEST").val(),
            "content-length": arrayBuffer.byteLength
          }
      });
    }

    function getListItem(fileListItemUri) {
      return jQuery.ajax({
        url: fileListItemUri,
        type: "GET",
        headers: { "accept": "application/json;odata=verbose",
          "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6IjJaUXBKM1VwYmpBWVhZR2FYRUpsOGxWMFRPSSIsImtpZCI6IjJaUXBKM1VwYmpBWVhZR2FYRUpsOGxWMFRPSSJ9.eyJhdWQiOiIwMDAwMDAwMy0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDAvd3RjY29tcHV0ZXIuc2hhcmVwb2ludC5jb21AZTk5ZmJhYTMtYjdmYy00OTc2LWE5ODgtODEzOGNiMmQ0Zjg5IiwiaXNzIjoiMDAwMDAwMDEtMDAwMC0wMDAwLWMwMDAtMDAwMDAwMDAwMDAwQGU5OWZiYWEzLWI3ZmMtNDk3Ni1hOTg4LTgxMzhjYjJkNGY4OSIsImlhdCI6MTY1OTUxNDY5OCwibmJmIjoxNjU5NTE0Njk4LCJleHAiOjE2NTk2MDEzOTgsImlkZW50aXR5cHJvdmlkZXIiOiIwMDAwMDAwMS0wMDAwLTAwMDAtYzAwMC0wMDAwMDAwMDAwMDBAZTk5ZmJhYTMtYjdmYy00OTc2LWE5ODgtODEzOGNiMmQ0Zjg5IiwibmFtZWlkIjoiYjU0N2ZkZGMtY2JkNS00ZTAwLWExNWQtZGVkYTMzZTczMzI4QGU5OWZiYWEzLWI3ZmMtNDk3Ni1hOTg4LTgxMzhjYjJkNGY4OSIsIm9pZCI6IjY3YzYwNDIwLWY4MzctNGQ1ZC1hNjU1LTA2OGI2MDU4ZWI3NSIsInN1YiI6IjY3YzYwNDIwLWY4MzctNGQ1ZC1hNjU1LTA2OGI2MDU4ZWI3NSIsInRydXN0ZWRmb3JkZWxlZ2F0aW9uIjoiZmFsc2UifQ.og2dVJFU6ZUZtsTeMTBgpvVS6fPs5o0Hie6ujFG5djJygT9R9izTTesGrGIrRDvqSCm4hgRSmyzCImUyEcsPaaV-I4sq5R-8AlI_CWnCffQVlUmeYh0HxUjYlhJjxQCVFuosLmy4yY4VxVLjXjO05HWKJ-qbufdFAbzftBxseYEeA2LCDljy_hCXRPPQMEZ5QIl1FupwkjVx84mhKo7OXkLufjl6mzdLTkk9Pz7S7Un9pL3r11kvi6qQOint6xE375KJ74lf3XgU7XMpjGGvXAeMhVj4rewsMXX_ABEPZONty0Rk5QLiNnDXquCZ_oXfo9nQjKIk1XrH4S6b3RdoxA",
        }
      });
    }

    // Change the display name and title of the list item.
    function updateListItem(itemMetadata) {
      var body = "{'__metadata':{'type':'"+itemMetadata.type+"'},'FileLeafRef':'"+newName+"','Title':'"+newName+"'}";
      return jQuery.ajax({
          url: itemMetadata.uri,
          type: "POST",
          data: body,
          headers: {
            "X-RequestDigest": jQuery("#__REQUESTDIGEST").val(),
            "Content-Type": "application/json;odata=verbose",
            "Accept": "application/json;odata=nometadata",
            "content-length": body.length,
            "IF-MATCH": itemMetadata.etag,
            "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6IjJaUXBKM1VwYmpBWVhZR2FYRUpsOGxWMFRPSSIsImtpZCI6IjJaUXBKM1VwYmpBWVhZR2FYRUpsOGxWMFRPSSJ9.eyJhdWQiOiIwMDAwMDAwMy0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDAvd3RjY29tcHV0ZXIuc2hhcmVwb2ludC5jb21AZTk5ZmJhYTMtYjdmYy00OTc2LWE5ODgtODEzOGNiMmQ0Zjg5IiwiaXNzIjoiMDAwMDAwMDEtMDAwMC0wMDAwLWMwMDAtMDAwMDAwMDAwMDAwQGU5OWZiYWEzLWI3ZmMtNDk3Ni1hOTg4LTgxMzhjYjJkNGY4OSIsImlhdCI6MTY1OTUxNDY5OCwibmJmIjoxNjU5NTE0Njk4LCJleHAiOjE2NTk2MDEzOTgsImlkZW50aXR5cHJvdmlkZXIiOiIwMDAwMDAwMS0wMDAwLTAwMDAtYzAwMC0wMDAwMDAwMDAwMDBAZTk5ZmJhYTMtYjdmYy00OTc2LWE5ODgtODEzOGNiMmQ0Zjg5IiwibmFtZWlkIjoiYjU0N2ZkZGMtY2JkNS00ZTAwLWExNWQtZGVkYTMzZTczMzI4QGU5OWZiYWEzLWI3ZmMtNDk3Ni1hOTg4LTgxMzhjYjJkNGY4OSIsIm9pZCI6IjY3YzYwNDIwLWY4MzctNGQ1ZC1hNjU1LTA2OGI2MDU4ZWI3NSIsInN1YiI6IjY3YzYwNDIwLWY4MzctNGQ1ZC1hNjU1LTA2OGI2MDU4ZWI3NSIsInRydXN0ZWRmb3JkZWxlZ2F0aW9uIjoiZmFsc2UifQ.og2dVJFU6ZUZtsTeMTBgpvVS6fPs5o0Hie6ujFG5djJygT9R9izTTesGrGIrRDvqSCm4hgRSmyzCImUyEcsPaaV-I4sq5R-8AlI_CWnCffQVlUmeYh0HxUjYlhJjxQCVFuosLmy4yY4VxVLjXjO05HWKJ-qbufdFAbzftBxseYEeA2LCDljy_hCXRPPQMEZ5QIl1FupwkjVx84mhKo7OXkLufjl6mzdLTkk9Pz7S7Un9pL3r11kvi6qQOint6xE375KJ74lf3XgU7XMpjGGvXAeMhVj4rewsMXX_ABEPZONty0Rk5QLiNnDXquCZ_oXfo9nQjKIk1XrH4S6b3RdoxA",
            "X-HTTP-Method": "MERGE"
          }
      });
    }
  }