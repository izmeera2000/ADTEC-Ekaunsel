/**
 * --------------------------------------------------------------------------
 * CoreUI PRO Boostrap Admin Template main.js
 * License (https:
 * --------------------------------------------------------------------------
 */

let myModal;

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
    const cardChart1 = new Chart(document.getElementById("card-chart1"), {
      type: "line",
      data: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
        ],
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

    cardChart1.data.datasets[0].pointBackgroundColor =
      coreui.Utils.getStyle("--cui-primary");
    cardChart1.update();
  }
};
$(document).ready(function () {
  if (document.getElementById("card-chart-new1")) {
    let cardChartNew1;
    $("#monthSelector").val(new Date().getMonth() + 1);

    function getSelectedValue(selector, defaultValue) {
      return $(selector).length ? $(selector).val() : defaultValue;
    }

    function fetchChartData(month, year) {
      $.ajax({
        url: "card_chart_kaunseling_total_day", // Replace with your PHP script URL
        method: "POST",
        data: {
          card_chart_kaunseling_total_day: {
            month: month,
            year: year,
          },
        },
        success: function (data) {
          console.log("Data received:", data);
          try {
            const response = JSON.parse(data);
            console.log("Parsed JSON:", response);

            const daysOfWeek = [
              "Monday",
              "Tuesday",
              "Wednesday",
              "Thursday",
              "Friday",
              "Saturday",
              "Sunday",
            ];
            const labels = response.map((item) => item.day_of_week);
            const totals = response.map((item) => parseInt(item.total)); // Ensure totals are integers

            console.log("Labels:", labels);
            console.log("Totals:", totals);

            const weeklyTotals = daysOfWeek.map((day) => {
              const index = labels.indexOf(day);
              return index !== -1 ? totals[index] : 0;
            });

            console.log("Weekly Totals:", weeklyTotals);

            const ctx = document
              .getElementById("card-chart-new1")
              .getContext("2d");

            // Destroy existing chart instance if it exists
            if (cardChartNew1) {
              cardChartNew1.destroy();
            }
            const displayTotal = totals.length ? totals : [0];
            $("#thismonthval").html(displayTotal.reduce((a, b) => a + b, 0));

            cardChartNew1 = new Chart(ctx, {
              type: "line",
              data: {
                labels: daysOfWeek,
                datasets: [
                  {
                    label: "Entries",
                    backgroundColor: `rgba(${coreui.Utils.getStyle(
                      "--cui-primary-rgb"
                    )}, .1)`,
                    borderColor: coreui.Utils.getStyle("--cui-primary"),
                    borderWidth: 3,
                    data: weeklyTotals,
                    fill: true,
                  },
                ],
              },
              options: {
                plugins: {
                  legend: { display: false },
                  tooltip: {
                    position: "nearest",
                    overflow: "auto",
                  },
                },
                maintainAspectRatio: false,
                scales: {
                  x: { display: false },
                  y: { beginAtZero: true, display: false },
                },
                elements: {
                  line: { borderWidth: 2, tension: 0.4 },
                  point: { radius: 0, hitRadius: 10, hoverRadius: 4 },
                },
              },
            });
          } catch (e) {
            console.error("Error parsing JSON:", e);
          }
        },
        error: function (xhr, status, error) {
          console.error("Error fetching data:", error);
        },
      });
    }

    $("#monthSelector, #yearSelector").change(function () {
      const selectedMonth = getSelectedValue(
        "#monthSelector",
        new Date().getMonth() + 1
      );
      const selectedYear = getSelectedValue(
        "#yearSelector",
        new Date().getFullYear()
      );
      fetchChartData(selectedMonth, selectedYear);
    });

    fetchChartData(new Date().getMonth() + 1, new Date().getFullYear());
  }
});

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
$(document).ready(function () {
  if (document.getElementById("main-bar-chart")) {
    $.ajax({
      url: "bar_chart_kaunseling_total",
      method: "POST",
      data: {
        bar_chart_kaunseling_total: {
          test: "test",
          year: new Date().getFullYear(),
        },
      },
      success: function (data) {
        console.log("Data received:", data);
        try {
          const response = JSON.parse(data);
          console.log("Parsed JSON:", response);

          // List of months in short form
          const months = [
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
          ];
          const monthFullNames = {
            January: "Jan",
            February: "Feb",
            March: "Mar",
            April: "Apr",
            May: "May",
            June: "Jun",
            July: "Jul",
            August: "Aug",
            September: "Sep",
            October: "Oct",
            November: "Nov",
            December: "Dec",
          };

          const labels = response.map((item) => monthFullNames[item.month]);
          const counts = response.map((item) => item.count);

          // Fill counts for each month, setting 0 if no data for a given month
          const monthlyCounts = months.map((month) => {
            const index = labels.indexOf(month);
            return index !== -1 ? parseInt(counts[index]) : 0;
          });

          console.log("Monthly Counts:", monthlyCounts);

          const ctx = document
            .getElementById("main-bar-chart")
            .getContext("2d");
          const mainBarChart = new Chart(ctx, {
            type: "bar",
            data: {
              labels: months,
              datasets: [
                {
                  label: "Entries",
                  backgroundColor: coreui.Utils.getStyle("--cui-primary"),
                  borderRadius: 6,
                  borderSkipped: false,
                  data: monthlyCounts,
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
                  border: { display: false },
                  grid: {
                    color: coreui.Utils.getStyle(
                      "--cui-border-color-translucent"
                    ),
                    display: false,
                    drawTicks: false,
                  },
                  ticks: {
                    color: coreui.Utils.getStyle("--cui-body-color"),
                    font: { size: 14 },
                    padding: 16,
                  },
                },
                y: {
                  beginAtZero: true,
                  border: { dash: [2, 4], display: false },
                  grid: {
                    color: coreui.Utils.getStyle(
                      "--cui-border-color-translucent"
                    ),
                  },
                  ticks: {
                    color: coreui.Utils.getStyle("--cui-body-color"),
                    font: { size: 14 },
                    maxTicksLimit: 5,
                    padding: 16,
                    stepSize: Math.ceil(100 / 4),
                  },
                },
              },
            },
          });

          mainBarChart.update();
        } catch (e) {
          console.error("Error parsing JSON:", e);
        }
      },
      error: function (xhr, status, error) {
        console.error("Error fetching data:", error);
      },
    });
  }
});

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
      data: function (d) {
        return {
          senaraistudent: {
            user_id: "test",
            limit: d.length,
            offset: d.start,
            draw: d.draw,
          },
        };
      },
    },
    columns: [
      { data: "a", className: "text-center" },
      { data: "b", responsivePriority: 1 },
      { data: "c", className: "text-center" },
      { data: "d", className: "text-center", responsivePriority: 1 },
    ],
    processing: true,
    serverSide: true,
    stateSave: true,
    responsive: true,
  });

  table1 = new DataTable("#editborang", {
    rowReorder: {
      selector: "td:nth-child(1), td:nth-child(2), td:nth-child(3)",
      update: false,
    },
    ajax: {
      type: "POST",
      url: "senaraisoalan",
      data: {
        senaraisoalan: {
          user_id: "test",
        },
      },
    },

    responsive: true,
    paging: false,
    columns: [
      { data: "a", className: "text-center re_order", responsivePriority: 1 },
      { data: "b", className: "text-center soalan", responsivePriority: 1 },
      { data: "c", className: "text-center kategori" },
      { data: "d", className: "text-center", responsivePriority: 1 },
    ],
    createdRow: function (row, data, dataIndex) {
      $(row).attr("data-id", data.id);
    },
  });

  table1.on("row-reorder", function (e, diff, edit) {
    var result = [];

    diff.forEach(function (rowData) {
      var id = $(rowData.node).data("id");
      var newPosition = rowData.newPosition + 1;

      if (id !== undefined) {
        result.push({
          id: id,
          re_order: newPosition,
        });
      }
    });

    $.ajax({
      url: "editborang/reorder",
      method: "POST",
      data: {
        order: result,
      },

      success: function (response) {
        showtoast("order changed");
        table1.ajax.reload();
      },
    });
    console.log(result);
  });

  table2 = new DataTable("#senaraitemujanji", {
    ajax: {
      type: "POST",
      url: "senaraitemujanji",
      data: function (d) {
        return {
          senaraitemujanji: {
            user_id: "test",
            limit: d.length,
            offset: d.start,
            draw: d.draw,
          },
        };
      },
    },
    stateSave: true,
    processing: true,
    serverSide: true,
    responsive: true,

    columns: [
      { data: "a", className: "text-center  " },
      { data: "b", className: "   ", responsivePriority: 1 },
      { data: "c", className: "text-center  ", responsivePriority: 1 },
      { data: "d", className: "text-center  " },
      { data: "e", className: "text-center", responsivePriority: 1 },
    ],
  });

  table3 = new DataTable("#senaraitemujanji2", {
    ajax: {
      type: "POST",
      url: "senaraitemujanji2",
      data: function (d) {
        return {
          senaraitemujanji2: {
            user_id: "test",
            limit: d.length,
            offset: d.start,
            draw: d.draw,
          },
        };
      },
    },

    processing: true,
    serverSide: true,
    responsive: true,
    stateSave: true,

    columns: [
      { data: "a", className: "text-center  " },
      { data: "b", className: "   ", responsivePriority: 1 },
      { data: "c", className: "text-center  ", responsivePriority: 1 },
      { data: "d", className: "text-center  " },
      { data: "e", className: "text-center", responsivePriority: 1 },
    ],
  });

  table4 = new DataTable("#senaraitemujanji3", {
    ajax: {
      type: "POST",
      url: "senaraitemujanji3",
      data: function (d) {
        return {
          senaraitemujanji3: {
            user_id: "test",
            limit: d.length,
            offset: d.start,
            draw: d.draw,
          },
        };
      },
    },

    processing: true,
    serverSide: true,
    responsive: true,
    stateSave: true,

    columns: [
      { data: "a", className: "text-center  " },
      { data: "b", className: "   ", responsivePriority: 1 },
      { data: "c", className: "text-center  ", responsivePriority: 1 },
      { data: "d", className: "text-center  " },
      { data: "e", className: "text-center", responsivePriority: 1 },
    ],
  });
});

const toastTrigger = document.getElementById("liveToastBtn");
const toastLiveExample = document.getElementById("liveToast");

if (toastTrigger) {
  toastTrigger.addEventListener("click", () => {
    $.each($(".toast"), function (i, item) {
      coreui.Toast.getOrCreateInstance(item).show();
    });
  });
}

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
    myModal.hide();
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
      },
    },
    success: function (response) {
      showtoast("Added Sucessfully");
      console.log(response);
      $("#add_soalan_content").prop("selectedIndex", 0);
      $("#add_soalan_soalan").val("");
      $("#add_soalan").modal("hide");
      table1.ajax.reload();
    },
  });
});

// Attach click event to dynamically loaded button within DataTable
$("#editborang").on("click", ".btn-action", function () {
  console.log("Button clicked!");

  // Access the closest row and retrieve cell data
  var rowId = $(this).closest("tr").attr("data-id");
  var soalan = $(this).closest("tr").find("td:eq(1)").text();
  var kategori1 = $(this).closest("tr").find("td:eq(2)").text();
  var kategori2 = $(this)
    .closest("tr")
    .find("td:eq(2) .text-center")
    .data("cat");

  console.log("Row ID:", rowId);
  console.log("Soalan:", soalan);
  console.log("Kategori 1:", kategori1);
  console.log("Kategori 2 (data-cat):", kategori2);

  // Populate modal fields with retrieved data
  $("#add_edit_soalan").val(soalan);
  $("#add_edit_content").val(kategori2);
  $("#soalan_id").val(rowId);
  showmodal("edit_soalan");
});

$("#editsoalan").click(function () {
  console.log("test");
  var rowId = $("#soalan_id").val();
  var soalan = $("#add_edit_soalan").val();
  var kategori = $("#add_edit_content").val();

  console.log(soalan);
  console.log(kategori);
  $.ajax({
    url: "editsoalan",
    method: "POST",
    data: {
      editsoalan: {
        id: rowId,
        soalan: soalan,
        kategori: kategori,
      },
    },
    success: function (response) {
      showtoast("Edited Successfully");
      console.log(response);
      // $("#add_soalan_content").prop("selectedIndex", 0);
      // $("#add_soalan_soalan").val("");
      $("#edit_soalan").modal("hide");
      table1.ajax.reload();
    },
  });
});

$("#deletesoalan").click(function () {
  console.log("test");
  var rowId = $("#soalan_id").val();
  var soalan = $("#add_edit_soalan").val();
  var kategori = $("#add_edit_content").val();

  console.log(soalan);
  console.log(kategori);
  $.ajax({
    url: "deletesoalan",
    method: "POST",
    data: {
      deletesoalan: {
        id: rowId,
        soalan: soalan,
        kategori: kategori,
      },
    },
    success: function (response) {
      showtoast("Edited Successfully");
      console.log(response);
      // $("#add_soalan_content").prop("selectedIndex", 0);
      // $("#add_soalan_soalan").val("");
      $("#edit_soalan").modal("hide");
      table1.ajax.reload();
    },
  });
});

if (document.getElementById("radarChart")) {
  const ctx = document.getElementById("radarChart").getContext("2d");
  const radarChart = new Chart(ctx, {
    type: "radar",
    data: {
      labels: [],
      datasets: [
        {
          label: "Latest",
          data: [],
          backgroundColor: "rgba(255, 99, 132, 0.5)",
          borderColor: "rgba(255, 99, 132, 1)",
          borderWidth: 2,
        },
        {
          label: "First",
          data: [],
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
      plugins: {
        tooltip: {
          callbacks: {
            label: function (context) {
              // Get the raw value
              const level = context.dataset.levels[context.dataIndex];

              const value = context.raw;
              return `${value} (${level})`; // Append "(level)" to value
            },
          },
        },
      },
    },
  });

  var ndp = document.getElementById("3").value;

  $.ajax({
    url: "kaunseling/student/psikologi",
    method: "POST",
    data: {
      test3: {
        ndp: ndp,
      },
    },

    success: function (response) {
      if (response.firstRow && response.lastRow) {
        console.log(response);

        let labels = [];
        let dataValues1 = [];
        let levels1 = [];
        let levels2 = [];

        response.firstRow.forEach(function (item) {
          labels.push(item.kategori_name);
          dataValues1.push(item.value);
          levels1.push(item.level); // Assuming `level` is available in `firstRow`
        });

        let dataValues2 = [];
        response.lastRow.forEach(function (item) {
          dataValues2.push(item.value);
          levels2.push(item.level); // Assuming `level` is available in `firstRow`
        });

        radarChart.data.labels = labels;

        radarChart.data.datasets[0].data = dataValues1;
        radarChart.data.datasets[1].data = dataValues2;

        radarChart.data.datasets[0].levels = levels1;
        radarChart.data.datasets[1].levels = levels2;

        radarChart.update();
      } else {
        console.error("Response does not contain expected datasets:");
      }
    },
    error: function (error) {
      console.error("Error fetching data", error);
    },
  });
}

if (document.getElementById("student_id_senarai")) {
  var user_id = $("#student_id_senarai").data("id");

  table5 = new DataTable("#senaraitemujanjib", {
    ajax: {
      type: "POST",
      url: "senaraitemujanji",
      data: function (d) {
        return {
          senaraitemujanji: {
            user_id: user_id,
            limit: d.length,
            offset: d.start,
            draw: d.draw,
          },
        };
      },
    },

    processing: true,
    serverSide: true,
    responsive: true,
    stateSave: true,

    columns: [
      { data: "a", className: "text-center  " },
      { data: "b", className: "   " },
      { data: "c", className: "text-center  ", responsivePriority: 1 },
      { data: "d", className: "text-center  " },
      { data: "e", className: "text-center", responsivePriority: 1 },
    ],
  });

  table6 = new DataTable("#senaraitemujanji2b", {
    ajax: {
      type: "POST",
      url: "senaraitemujanji2",
      data: function (d) {
        return {
          senaraitemujanji2: {
            user_id: user_id,
            limit: d.length,
            offset: d.start,
            draw: d.draw,
          },
        };
      },
    },

    processing: true,
    serverSide: true,
    stateSave: true,
    responsive: true,

    columns: [
      { data: "a", className: "text-center  " },
      { data: "b", className: "   " },
      { data: "c", className: "text-center  ", responsivePriority: 1 },
      { data: "d", className: "text-center  " },
      { data: "e", className: "text-center", responsivePriority: 1 },
    ],
  });

  table7 = new DataTable("#senaraitemujanji3b", {
    ajax: {
      type: "POST",
      url: "senaraitemujanji3",
      data: function (d) {
        return {
          senaraitemujanji3: {
            user_id: user_id,
            limit: d.length,
            offset: d.start,
            draw: d.draw,
          },
        };
      },
    },

    processing: true,
    serverSide: true,
    responsive: true,
    stateSave: true,

    columns: [
      { data: "a", className: "text-center  " },
      { data: "b", className: "   " },
      { data: "c", className: "text-center  ", responsivePriority: 1 },
      { data: "d", className: "text-center  " },
      { data: "e", className: "text-center", responsivePriority: 1 },
    ],
  });
}

if (document.getElementById("event_status_3")) {
  const now = new Date();
  const startTime = new Date(
    document.getElementById("starttime").dataset.value
  );
  const endTime = new Date(document.getElementById("endtime").dataset.value);

  const totalTime = endTime - startTime;
  const elapsedTime = now - startTime;

  const progressPercentage = Math.floor((elapsedTime / totalTime) * 100, 100);
  console.log(progressPercentage);

  if (progressPercentage <= 100) {
    document
      .getElementById("timeprogress")
      .setAttribute("aria-valuenow", progressPercentage);
    document.getElementById("timeprogress").style.width =
      progressPercentage + "%";
  } else {
    document.getElementById("timeprogress").classList.remove("bg-success");
    document.getElementById("timeprogress").classList.add("bg-warning");
    document.getElementById("timeprogress").style.width = "100%";
  }
}

$("#mulaoffline").click(function () {
  var meeting_id = $("#p_id").attr("data-id");

  var start = $("#mulamasa").val();
  var end = $("#tamatmasa").val();
  var user_id = $("#user_id").val();
  var user_mail = $("#user_mail").val();

  $.ajax({
    url: "temujanji_update",
    method: "POST",
    data: {
      temujanji_update: {
        meeting_id: meeting_id,

        start: start,
        end: end,
        user_id: user_id,
        user_mail: user_mail,
      },
    },

    success: function (response) {
      console.log(response);
    },
    error: function (error) {
      console.error("Error fetching data", error);
    },
  });
});

$("#mula2").click(function () {});

$("#mulaonline").click(function () {
  showmodal("temujanji_mula");
});

$("#temujanji_mula_submit").click(function () {
  var meeting_id = $("#temujanji_mula_id").val();

  var manual = $("#temujanji_manual_input").val();
  var start = $("#mulamasa").val();
  var end = $("#tamatmasa").val();
  var user_id = $("#user_id").val();
  var user_mail = $("#user_mail").val();
  var selector = $('input[name="options-outlined2"]:checked').val();

  console.log(selector);

  $.ajax({
    url: "temujanji_update",
    method: "POST",
    data: {
      temujanji_update: {
        meeting_id: meeting_id,
        manual: manual,
        selector: selector,
        start: start,
        end: end,
        user_id: user_id,
        user_mail: user_mail,
      },
    },

    success: function (response) {
      console.log(response);

      showtoast(response);

      if (!response) {
        location.reload();
      }
    },
    error: function (error) {
      console.error("Error fetching data", error);
    },
  });
});

$('input[name="options-outlined2"]').click(function () {
  if ($(this).val() == 0) {
    if (!$("#temujanji_manual").hasClass("d-none")) {
      $("#temujanji_manual").addClass("d-none");
    }
  } else {
    if ($("#temujanji_manual").hasClass("d-none")) {
      $("#temujanji_manual").removeClass("d-none");
    }
  }
});

$(document).ready(function () {
  // Initialize DataTable
  if (document.getElementById("meetinganlytics")) {
    $.ajax({
      url: "fetch_masalah", // Replace with your PHP script path
      method: "POST",
      data: {
        fetch_masalah: {
          test: "ndp",
        },
      },
      success: function (response) {
        // showtoast("Edited Successfully");
        // console.log(response);
        $("#MasalahF").html(JSON.parse(response));
        // $("#add_soalan_content").prop("selectedIndex", 0);
        // $("#add_soalan_soalan").val("");
        // $("#edit_soalan").modal("hide");
        // table1.ajax.reload();
      },
    });

    tableanalytics = new DataTable("#meetinganlytics", {
      ajax: {
        type: "POST",
        url: "kaunseling_analytics",
        data: function (d) {
          return {
            kaunseling_analytics: {
              limit: d.length,
              offset: d.start,
              draw: d.draw,
              search: d.search.value, // Add search parameter
              gender: $("#JantinaF").val(), // Get value from gender filter
              masalah: $("#MasalahF").val(), // Get value from masalah filter
              status: $("#StatusF").val(),
            },
          };
        },
      },

      processing: true,
      serverSide: true,
      responsive: true,
      stateSave: true,
      ordering: false, // Disable ordering
      columns: [
        { data: "a", className: "  " },
        { data: "b", className: "text-center     " },
        { data: "c", className: "text-center  " },
      ],
    });

    $("#JantinaF, #MasalahF, #StatusF").on("change", function () {
      tableanalytics.ajax.reload(); // Reload the table data
    });
  }
});

$(document).ready(function () {
  $("#event_status_3").click(function () {
    // console.log("rete");
    showmodal("temujanji_final");

    // var meeting_id = $("#temujanji_mula_id").val();
    // var user_id = $("#user_id").val();
    // var user_mail = $("#user_mail").val();

    // $.ajax({
    //   url: "temujanji_end",
    //   method: "POST",
    //   data: {
    //     temujanji_end: {
    //       meeting_id: meeting_id,
    //       user_id: user_id,
    //       user_mail: user_mail,
    //     },
    //   },
    //   success: function (response) {
    //     if (!response) {
    //       location.reload();
    //     }
    //   },
    //   error: function (error) {
    //     console.error("Error fetching data", error);
    //   },
    // });
  });
});
$(document).ready(function () {
  $('input[name="options-outlined2_final"]').click(function () {
    // alert('You selected: ' + $(this).val());
    if ($(this).val() == 1) {
      $("#temujanji_final_approve").removeClass("d-none");
    } else {
      $("#temujanji_final_approve").addClass("d-none");
    }
  });
});

$("#sejarahkaunseling").DataTable();

$('button[data-coreui-toggle="tab"]').on("shown.coreui.tab", function (e) {
  // console.log("test");
  $("#senaraitemujanji").DataTable().columns.adjust().responsive.recalc();
  $("#senaraitemujanji2").DataTable().columns.adjust().responsive.recalc();
  $("#senaraitemujanji3").DataTable().columns.adjust().responsive.recalc();
  $("#senaraitemujanjib").DataTable().columns.adjust().responsive.recalc();
  $("#senaraitemujanji2b").DataTable().columns.adjust().responsive.recalc();
  $("#senaraitemujanji3b").DataTable().columns.adjust().responsive.recalc();
});

tablegambar = new DataTable("#editgambar", {
  rowReorder: {
    selector: "td:nth-child(1), td:nth-child(2)",
    update: false,
  },
  ajax: {
    type: "POST",
    url: "senaraigambar",
    data: {
      senaraigambar: {
        user_id: "test",
      },
    },
  },

  responsive: true,
  paging: false,
  columns: [
    { data: "a", className: "text-center re_order", responsivePriority: 1 },
    { data: "b", className: "text-center filepath", responsivePriority: 1 },
    { data: "d", className: "text-center", responsivePriority: 1 },
  ],
  createdRow: function (row, data, dataIndex) {
    $(row).attr("data-id", data.id);
  },
});

tablegambar.on("row-reorder", function (e, diff, edit) {
  var result = [];

  diff.forEach(function (rowData) {
    var id = $(rowData.node).data("id");
    var newPosition = rowData.newPosition + 1;

    if (id !== undefined) {
      result.push({
        id: id,
        re_order: newPosition,
      });
    }
  });

  $.ajax({
    url: "editgambar/reorder",
    method: "POST",
    data: {
      order2: result,
    },

    success: function (response) {
      showtoast("order changed");
      tablegambar.ajax.reload();
    },
  });

  console.log(result);
});

$("#editgambar").on("click", ".btn-delete-gambar", function () {
  console.log("Button clicked!");

  // Access the closest row and retrieve cell data
  var rowId = $(this).closest("tr").attr("data-id");

  $.ajax({
    url: "deletegambar",
    method: "POST",
    data: {
      deletegambar: {
        id: rowId,
      },
    },

    success: function (response) {
      showtoast("deleted");
      tablegambar.ajax.reload();
    },
  });
});
