/* global Chart, coreui, i18next */

/**
 * --------------------------------------------------------------------------
 * CoreUI PRO Boostrap Admin Template main.js
 * License (https://coreui.io/pro/license/)
 * --------------------------------------------------------------------------
 */

// Disable the on-canvas tooltip
let myModal; // Declare the modal instance outside of the function

Chart.defaults.pointHitDetectionRadius = 1;
Chart.defaults.plugins.tooltip.enabled = false;
Chart.defaults.plugins.tooltip.mode = "index";
Chart.defaults.plugins.tooltip.position = "nearest";
Chart.defaults.plugins.tooltip.external = coreui.ChartJS.customTooltips;
Chart.defaults.defaultFontColor = coreui.Utils.getStyle("--cui-body-color");
document.documentElement.addEventListener("ColorSchemeChange", () => {
  updateCharts();
});
window.addEventListener("DOMContentLoaded", () => {
  updateCharts();
});

const updateCharts = () => {
  if (document.getElementById("card-chart1")) {
    cardChart1.data.datasets[0].pointBackgroundColor =
      coreui.Utils.getStyle("--cui-primary");
    cardChart1.update();
  }

  if (document.getElementById("main-bar-chart")) {
    mainBarChart.options.scales.x.ticks.color =
      coreui.Utils.getStyle("--cui-body-color");
    mainBarChart.options.scales.y.ticks.color =
      coreui.Utils.getStyle("--cui-body-color");
    mainBarChart.options.scales.x.grid.color = coreui.Utils.getStyle(
      "--cui-border-color-translucent"
    );
    mainBarChart.options.scales.x.ticks.color =
      coreui.Utils.getStyle("--cui-body-color");
    mainBarChart.options.scales.y.grid.color = coreui.Utils.getStyle(
      "--cui-border-color-translucent"
    );
    mainBarChart.options.scales.y.ticks.color =
      coreui.Utils.getStyle("--cui-body-color");
    mainBarChart.update();
  }
};
if (document.getElementById("card-chart-new1")) {
  // eslint-disable-next-line no-unused-vars
  const cardChartNew1 = new Chart(document.getElementById("card-chart-new1"), {
    type: "line",
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [
        {
          label: "My First dataset",
          backgroundColor: `rgba(${coreui.Utils.getStyle(
            "--cui-primary-rgb"
          )}, .1)`,
          borderColor: coreui.Utils.getStyle("--cui-primary"),
          borderWidth: 3,
          data: [78, 81, 80, 45, 34, 22, 40],
          fill: true,
        },
      ],
    },
    options: {
      plugins: {
        legend: {
          display: false,
        },
      },
      maintainAspectRatio: false,
      scales: {
        x: {
          display: false,
        },
        y: {
          beginAtZero: true,
          display: false,
        },
      },
      elements: {
        line: {
          borderWidth: 2,
          tension: 0.4,
        },
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4,
        },
      },
    },
  });
}
{
  const cardChart1 = new Chart(document.getElementById("card-chart1"), {
    type: "line",
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [
        {
          label: "My First dataset",
          backgroundColor: "transparent",
          borderColor: "rgba(255,255,255,.55)",
          pointBackgroundColor: coreui.Utils.getStyle("--cui-primary"),
          data: [65, 59, 84, 84, 51, 55, 40],
        },
      ],
    },
    options: {
      plugins: {
        legend: {
          display: false,
        },
      },
      maintainAspectRatio: false,
      scales: {
        x: {
          border: {
            display: false,
          },
          grid: {
            display: false,
          },
          ticks: {
            display: false,
          },
        },
        y: {
          min: 30,
          max: 89,
          display: false,
          grid: {
            display: false,
          },
          ticks: {
            display: false,
          },
        },
      },
      elements: {
        line: {
          borderWidth: 1,
          tension: 0.4,
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4,
        },
      },
    },
  });
}
if (document.getElementById("card-chart3")) {
  const cardChart3 = new Chart(document.getElementById("card-chart3"), {
    type: "line",
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [
        {
          label: "My First dataset",
          backgroundColor: "rgba(255,255,255,.2)",
          borderColor: "rgba(255,255,255,.55)",
          data: [78, 81, 80, 45, 34, 12, 40],
          fill: true,
        },
      ],
    },
    options: {
      plugins: {
        legend: {
          display: false,
        },
      },
      maintainAspectRatio: false,
      scales: {
        x: {
          display: false,
        },
        y: {
          display: false,
        },
      },
      elements: {
        line: {
          borderWidth: 2,
          tension: 0.4,
        },
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4,
        },
      },
    },
  });
}
if (document.getElementById("card-chart4")) {
  const cardChart4 = new Chart(document.getElementById("card-chart4"), {
    type: "bar",
    data: {
      labels: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
        "January",
        "February",
        "March",
        "April",
      ],
      datasets: [
        {
          label: "My First dataset",
          backgroundColor: "rgba(255,255,255,.2)",
          borderColor: "rgba(255,255,255,.55)",
          data: [
            78, 81, 80, 45, 34, 12, 40, 85, 65, 23, 12, 98, 34, 84, 67, 82,
          ],
          barPercentage: 0.6,
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        },
      },
      scales: {
        x: {
          grid: {
            display: false,
            drawTicks: false,
          },
          ticks: {
            display: false,
          },
        },
        y: {
          border: {
            display: false,
          },
          grid: {
            display: false,
            drawTicks: false,
          },
          ticks: {
            display: false,
          },
        },
      },
    },
  });
}
if (document.getElementById("main-bar-chart")) {
  const mainBarChart = new Chart(document.getElementById("main-bar-chart"), {
    type: "bar",
    data: {
      labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      datasets: [
        {
          label: "Users",
          backgroundColor: coreui.Utils.getStyle("--cui-primary"),
          borderRadius: 6,
          borderSkipped: false,
          data: [
            78, 81, 80, 45, 34, 12, 40, 85, 65, 23, 12, 98, 34, 84, 67, 82,
          ],
          barPercentage: 0.6,
          categoryPercentage: 0.5,
        },
        {
          label: "New users",
          backgroundColor: coreui.Utils.getStyle("--cui-gray-100"),
          borderRadius: 6,
          borderSkipped: false,
          data: [
            78, 81, 80, 45, 34, 12, 40, 85, 65, 23, 12, 98, 34, 84, 67, 82,
          ],
          barPercentage: 0.6,
          categoryPercentage: 0.5,
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        },
      },
      scales: {
        x: {
          border: {
            display: false,
          },
          grid: {
            color: coreui.Utils.getStyle("--cui-border-color-translucent"),
            display: false,
            drawTicks: false,
          },
          ticks: {
            color: coreui.Utils.getStyle("--cui-body-color"),
            font: {
              size: 14,
            },
            padding: 16,
          },
        },
        y: {
          beginAtZero: true,
          border: {
            dash: [2, 4],
            display: false,
          },
          grid: {
            color: coreui.Utils.getStyle("--cui-border-color-translucent"),
          },
          ticks: {
            color: coreui.Utils.getStyle("--cui-body-color"),
            font: {
              size: 14,
            },
            maxTicksLimit: 5,
            padding: 16,
            stepSize: Math.ceil(100 / 4),
          },
        },
      },
    },
  });
}
$(document).ready(() => {
  new DataTable("#sejarahk", {
    ajax: "kaunseling_sejarah",
    processing: true,
    serverSide: true,
  });

  table1 = new DataTable("#senaraistudent", {
    ajax: {
      type: "POST",
      url: "senaraistudent",
      data: {
        senaraistudent: {
          user_id: "test",
          // title: title,
          // start: date,
        },
      },
    },
    columns: [
      { data: "a", className: "text-center" },
      { data: "b" },
      { data: "c", className: "text-center" },
      { data: "d", className: "text-center" },
    ],
  });

  // console.log(table1.rows().data().toArray())

  // $.ajax({
  //   type: "POST",
  //   url: "editborang/reorder",
  //   data: {
  //     order: {
  //       user_id: "user_id",
  //     },
  //   },
  //   success: function (response) {
  //     console.log(response);
  //   },
  // });

  table1 = new DataTable("#editborang", {
    rowReorder: {
      selector: "td:nth-child(1), td:nth-child(2), td:nth-child(3)", // This allows reordering by dragging either the first or second column
      update: false,
    },
    ajax: {
      type: "POST",
      url: "senaraisoalan",
      data: {
        senaraisoalan: {
          user_id: "test",
          // title: title,
          // start: date,
        },
      },
    },
    // pageLength: 1000,
    // dom:'frtip',
    responsive: true,
    paging: false,
    columns: [
      { data: "a", className: "text-center re_order" },
      { data: "b", className: "text-center soalan" },
      { data: "c", className: "text-center kategori" },
      { data: "d", className: "text-center" },
    ],
    createdRow: function (row, data, dataIndex) {
      $(row).attr("data-id", data.id); // Set data-id attribute on each row
    },
  });

  table1.on("row-reorder", function (e, diff, edit) {
    var result = [];

    // Iterate over the rows that were reordered
    diff.forEach(function (rowData) {
      var id = $(rowData.node).data("id"); // Get the 'id' from the data attribute
      var newPosition = rowData.newPosition + 1; // Use 1-based index for re_order

      if (id !== undefined) {
        result.push({
          id: id,
          re_order: newPosition,
        });
      }
    });

    // Send the reordered data to the server to update the database
    $.ajax({
      url: "editborang/reorder",
      method: "POST",
      data: {
        order: result,
      },

      success: function (response) {
        showtoast("order changed");
        table1.ajax.reload(); // Reload DataTable data
      },
    });
    console.log(result);
  });
});

const toastTrigger = document.getElementById("liveToastBtn");
const toastLiveExample = document.getElementById("liveToast");

if (toastTrigger) {
  // const toastCoreUI = coreui.Toast.getOrCreateInstance($('.toast'))
  toastTrigger.addEventListener("click", () => {
    $.each($(".toast"), function (i, item) {
      coreui.Toast.getOrCreateInstance(item).show();
    });
  });
}
// document.addEventListener("DOMContentLoaded", function(event){
//   $.each($(".toast"), function (i, item) {coreui.Toast.getOrCreateInstance(item).show();});
// });

// document.addEventListener("DOMContentLoaded", function(event){
//   const myModal = new coreui.Modal("#calendaradd")
//   myModal.show();
// });

function showtoast($message) {
  document.getElementById("jstoastmessage").innerHTML = $message;

  $("#jstoast").toast("show");
}

function showmodal($main) {
   myModal = new coreui.Modal("#" + $main);

  myModal.show();
}


function hidemodal() {
  if (myModal) {
    myModal.hide(); // Hide the modal
  }
}

$("#add_soalan_button").click(function () {
  console.log("test");

  var soalan = $("#add_soalan_soalan").val();
  var kategori = $("#add_soalan_content").val();

  console.log(soalan);
  console.log(kategori);
  $.ajax({
    url: "addsoalan",
    method: "POST",
    data: {
      addsoalan: {
        soalan: soalan,
        kategori: kategori,
        // title: title,
        // start: date,
      },
    },
    success: function (response) {
      showtoast("tambah");
      console.log(response);
      $("#add_soalan_content").prop("selectedIndex", 0);
      $("#add_soalan_soalan").val("");
      $("#add_soalan").modal("hide");
      table1.ajax.reload(); // Reload DataTable data
    },
  });
});

// Create the Radar Chart
const ctx = document.getElementById("radarChart").getContext("2d");
const radarChart = new Chart(ctx, {
  type: "radar",
  data: {
    labels: [], // Labels will be set dynamically
    datasets: [
      {
        label: "Latest", // Label for the first dataset
        data: [], // Data will be set dynamically
        backgroundColor: "rgba(255, 99, 132, 0.5)",
        borderColor: "rgba(255, 99, 132, 1)",
        borderWidth: 2,
      },
      {
        label: "First", // Label for the second dataset
        data: [], // Data will be set dynamically
        backgroundColor: "rgba(54, 162, 235, 0.5)",
        borderColor: "rgba(54, 162, 235, 1)",
        borderWidth: 2,
      },
    ],
  },
  options: {
    responsive: true,

    scales: {
      r: {
        beginAtZero: true,
      },
    },
  },
});

// Fetch data via AJAX

var ndp = document.getElementById("3").value;

console.log(ndp);
$.ajax({
  url: "kaunselor/student/psikologi", // URL to your PHP script that returns data
  method: "POST",
  data: {
    test3: {
      ndp: ndp,
      // title: title,
      // start: date,
    },
  },

  success: function (response) {
    // Check if response contains the expected datasets
    if (response.firstRow && response.lastRow) {
      console.log(response);
      // Process firstRow
      let labels = [];
      let dataValues1 = [];
      response.firstRow.forEach(function (item) {
        labels.push(item.kategori_name);
        dataValues1.push(item.value);
      });

      // Process lastRow
      let dataValues2 = [];
      response.lastRow.forEach(function (item) {
        dataValues2.push(item.value);
      });

      // Set labels for the chart
      radarChart.data.labels = labels;

      // Set data for the datasets
      radarChart.data.datasets[0].data = dataValues1; // Dataset 1
      radarChart.data.datasets[1].data = dataValues2; // Dataset 2

      // Update the chart with new data
      radarChart.update();
    } else {
      console.error("Response does not contain expected datasets:", response);
    }
  },
  error: function (error) {
    console.error("Error fetching data", error);
  },
});
//# sourceMappingURL=main.js.map
