/**
 * --------------------------------------------------------------------------
 * CoreUI PRO Boostrap Admin Template calendar.js
 * License (https:
 * --------------------------------------------------------------------------
 */

document.addEventListener("DOMContentLoaded", () => {
  var holidays = [];

  function isMobile() {
    return window.innerWidth <= 768; // Change this value based on your mobile breakpoint
  }
  function getAllEvents(info, successCallback, failureCallback) {
    $.ajax({
      type: "POST",
      url: "calendarfetch",
      data: {
        calendarfetch: {
          start: info.startStr,
          end: info.endStr,
        },
      },
      success: function (response) {
        successCallback(JSON.parse(response));
        // console.log(response);
      },
    });
    $.ajax({
      type: "POST",
      url: "calendarfetchcuti", // Your endpoint to fetch holiday data
      data: {
        calendarfetchcuti: {
          start: info.startStr, // Start date for fetching holidays
          end: info.endStr, // End date for fetching holidays
        },
      },
      success: function (response) {
        // Assuming the response is a JSON object or an array of holiday dates
        // console.log(response); // Check the response structure

        // If the response is an array of dates, for example: ["2024-12-25", "2024-01-01"]
        holidays = Array.isArray(response) ? response : JSON.parse(response);  // Ensure `holidays` is an array

        // Apply holiday styling to the dates in the calendar
        applyHolidayStyling(holidays);
        // If the response is a JSON object containing a 'holidays' array:
        // holidays = response.holidays;

        // Now, you have the holidays array, and you can use it to modify your FullCalendar
        // Example: disable holidays in the calendar view
      },
      error: function (xhr, status, error) {
        console.error("Error fetching holidays:", error);
      },
    });
  }
  function applyHolidayStyling(holidays) {
    holidays.forEach(function(holiday) {
      console.log(holiday)
       const dateCell = document.querySelector(`[data-date='${holiday.tarikh}']`);
      if (dateCell) {
        dateCell.classList.add("grayed-out"); // Add the 'grayed-out' class to disable the date
      }  
    });
  }
  function clickonEvent(info) {
    if (info.event.backgroundColor != "gray") {
      document.getElementById("user_calendarevent_title").innerHTML =
        info.event.extendedProps.masalah;

      document.getElementById("user_calendarevent_id").value = info.event.id;

      document.getElementById("user_calendarevent_date").value = new Date(
        info.event.startStr
      ).toLocaleDateString("en-GB", {
        day: "2-digit",
        month: "2-digit",
        year: "2-digit",
      });

      document.getElementById("user_calendarevent_type").value =
        info.event.extendedProps.jenis;

      document.getElementById("user_calendarevent_sebab").value =
        info.event.extendedProps.sebab;

      var button1 = document.getElementById("user_calendarevent_button");
      var button2 = document.getElementById("user_calendarevent_button2");
      var reject_place = document.getElementById("rejected_place");

      if (info.event.extendedProps.event_status == 1) {
        if (button1.classList.contains("d-none")) {
          button1.classList.remove("d-none");
        }
        if (!button2.classList.contains("d-none")) {
          button2.classList.add("d-none");
        }
      } else {
        button2.classList.remove("btn-success", "btn-secondary", "btn-info");

        if (button2.classList.contains("d-none")) {
          button2.classList.remove("d-none");
        }
        if (!button1.classList.contains("d-none")) {
          button1.classList.add("d-none");
        }

        if (info.event.extendedProps.event_status == 2) {
          button2.classList.add("btn-success");
        }
        if (info.event.extendedProps.event_status == 3) {
          button2.classList.add("btn-info");
        }
        if (info.event.extendedProps.event_status == 4) {
          button2.classList.add("btn-secondary");
        }
        if (!reject_place.classList.contains("d-none")) {
          reject_place.classList.add("d-none");
        }
        if (info.event.extendedProps.event_status == 0) {
          button2.classList.add("btn-danger");
          reject_place.classList.remove("d-none");
        }
      }

      showmodal("user_calendarevent");
    }
  }

  function selectDate(info) {
    const selectedDate = info.startStr;  // Date in 'YYYY-MM-DD' format

    const isHoliday = holidays.some(holiday => holiday.tarikh === selectedDate);
    if (isHoliday) {
      // console.log("Selected date is a holiday:", selectedDate);
      // showtoast("Selected date is a holiday");  // Show message if needed
      calendar.unselect();  // Prevent selection
      return;
    }

    if (info.startStr >= new Date().toISOString().split("T")[0]) {
      // alert('Selected date: ' + info.startStr);
      document.getElementById("user_calendaradd_date").value = new Date(
        info.startStr
      ).toLocaleDateString("en-GB", {
        day: "2-digit",
        month: "2-digit",
        year: "2-digit",
      });

      showmodal("user_calendaradd");
    } else {
      // showtoast("date not valid");
      // calendar.unselect();
    }
    calendar.unselect();
  }

  function checkoverlapself(info) {
    console.log(info);
  }

  const calendarEl = document.getElementById("calendar");

  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay",
    },

    dayMaxEventRows: 2,
    eventOrder: "-title",
    events: getAllEvents,
    eventContent: function (info) {
      let eventTitle;

      // If on mobile, use extendedProps, otherwise use the default title
      if (isMobile()) {
        maxTitleLength = 5;
      } else {
        maxTitleLength = 10;
      }
      eventTitle =
        info.event.extendedProps.masalah.length > maxTitleLength
          ? info.event.extendedProps.masalah.substring(0, maxTitleLength) +
            "..."
          : info.event.extendedProps.masalah;

      // Return the event content as a DOM element
      let titleElement = document.createElement("div");
      titleElement.innerHTML = eventTitle;
      return { domNodes: [titleElement] };
    },
    lazyFetching: true,
    selectable: true,
    selectHelper: true,
    unselectAuto: false, // Prevent auto unselect on page click
    eventLongPressDelay: 500, // Helps with touch responsiveness
    LongPressDelay: 500, // Helps with touch responsiveness
    selectLongPressDelay: 500,
    dayCellDidMount: function (info) {
      // Get today's date without time
      if (info.el.classList.contains("fc-day-past")) {
        info.el.classList.add("grayed-out");
      }
    },
    datesSet: function () {
      let pastCells = document.querySelectorAll(".fc-day-past");
      pastCells.forEach(function (cell) {
        cell.classList.add("grayed-out");
      });
    },
    selectConstraint: {
      start: "00:00", // Start at the beginning of the day
      end: "24:00", // End at the last moment of the day
    },
    height: "auto",
    selectOverlap: true,
    eventOverlap: false,
    select: selectDate,
    eventClick: clickonEvent,
    hiddenDays: [0, 6],
    windowResize: function (arg) {
      calendar.render();
    },
  });


  calendar.render();

  $("#user_calendaradd_button").click(function () {
    calendar_add("user_calendaradd");
  });

  $("#user_calendarevent_button").click(function () {
    // console.log("testasda");
    calendar_delete("user_calendarevent");
  });
  $("#user_calendarevent_button2").click(function () {
    // var url = window.location.protocol + "//" + window.location.host;

    var id = document.getElementById("user_calendarevent_id").value;

    window.location.href = "temujanji/" + id;
  });

  function calendar_add(id) {
    const date = document.getElementById("user_calendaradd_date").value;
    const title = document.getElementById("user_calendaradd_content").value;
    const user_id = document.getElementById("user_calendaradd_id").value;
    const type = document.getElementById("user_calendaradd_type").value;

    if (title) {
      $.ajax({
        type: "POST",
        url: "calendaraddna",
        data: {
          calendaraddna: {
            user_id: user_id,
            title: title,
            start: date,
            type: type,
          },
        },
        success: function (response) {
          showtoast("added");
          calendar.refetchEvents();
        },
      });
    }

    calendar.refetchEvents();

    $("#" + id).modal("hide");
    document.getElementById("user_calendaradd_title").value = "";
  }

  function calendar_delete(id) {
    const date = document.getElementById(id + "_date").value;
    const title = document.getElementById(id + "_title").value;
    const user_id = document.getElementById(id + "_id").value;

    $.ajax({
      type: "POST",
      url: "calendardeletena",
      data: {
        calendardeletena: {
          user_id: user_id,
        },
      },
      success: function (response) {
        showtoast("deleted");
        calendar.refetchEvents();
      },
    });

    $("#" + id).modal("hide");
    document.getElementById(id + "_title").value = "";
  }

  document
    .getElementById("monthViewBtn")
    .addEventListener("click", function () {
      calendar.changeView("dayGridMonth");
    });

  document.getElementById("weekViewBtn").addEventListener("click", function () {
    calendar.changeView("timeGridWeek");
  });

  document.getElementById("dayViewBtn").addEventListener("click", function () {
    calendar.changeView("timeGridDay");
  });
  // document.getElementById("listdayViewBtn").addEventListener("click", function () {
  //   calendar.changeView("listDay");
  // });
});
