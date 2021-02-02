var urlParams = new URLSearchParams(window.location.search);
var jobId = urlParams.get("j");

if (jobId === "" || jobId === null) {
  loadJobsList();
} else {
  getJob(jobId);
  openModal();
}

function loadJobsList() {
  $.getJSON(
    "https://boards-api.greenhouse.io/v1/boards/sfmotors/departments?content=true&render_as=list",
    function(data) {
      if (data) {
        var jobData = data.departments,
          arrayLength = jobData.length,
          htmlBlock = "<h3>CURRENT JOB OPENINGS AT SF MOTORS</h3>";
        if (jobData)
          for (var z = 0; z < arrayLength; z++) {
            if (jobData[z].jobs.length > 0) {
              htmlBlock +=
                '<h5 class="career-department">' + jobData[z].name + "</h5>"; // Jobs Department Headers
              htmlBlock += '<div class="department-jobs">'; // Jobs List
              for (var y = 0; y < jobData[z].jobs.length; y++) {
                htmlBlock +=
                  '<p><a class="job-link" id=' +
                  jobData[z].jobs[y].id +
                  " href=/careers/" +
                  jobData[z].jobs[y].id +
                  ' target="_blank">' +
                  jobData[z].jobs[y].title +
                  "</a><br />";
                htmlBlock +=
                  "<span>" + jobData[z].jobs[y].location.name + "</span></p>";
              }
              htmlBlock += "</div>";
            }
          }
        $("#careers-main").html(htmlBlock);
      }
      $(".job-link").click(function(e) {
        e.preventDefault();
        var jobId = this.id;
        window.location.href = window.location + "?j=" + jobId;
      });
    }
  );
}
function htmlDecode(input) {
  var e = document.createElement("div");
  e.innerHTML = input;
  var html = e.childNodes[0].nodeValue;
  return html;
}
function getJob(jobId) {
  $.getJSON(
    "https://boards-api.greenhouse.io/v1/boards/sfmotors/jobs/" + jobId,
    function(data) {
      if (data) {
        var jobBlock = htmlDecode(data.content);

        $("#job-content").append(
          "<h3>" +
            data.title +
            '<a rel="noopener noreferrer" target="_blank" href=' +
            data.absolute_url +
            '#app class="job-btn">Apply</a></h3>'
        );
        $("#job-content").append(jobBlock);
      }
    }
  );
}
function openModal() {
  $("#job-content").removeClass("hide-modal");
}

$(document).ready(function(){$("#careers-main").prev().remove();})
whenReadyMakeNavLight(true);
