/**
 * --------------------------------------------------------------------------
 * CoreUI PRO Boostrap Admin Template calendar.js
 * License (https:
 * --------------------------------------------------------------------------
 */

document.addEventListener("DOMContentLoaded", () => {
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
      },
    });
  }

  function clickonEvent(info) {
    if (info.event.backgroundColor != "gray") {
      if (info.event.extendedProps.event_status != 0) {
        document.getElementById("user_calendarevent_title").innerHTML =
          info.event.extendedProps.masalah;

        document.getElementById("user_calendarevent_id").value = info.event.id;

        document.getElementById("user_calendarevent_date").value =
          info.event.startStr;

          document.getElementById("user_calendarevent_type").value =
          info.event.extendedProps.jenis;

        showmodal("user_calendarevent");
      } else {
        showtoast("rejected");
      }
    }
  }

  function selectDate(info) {
    document.getElementById("user_calendaradd_date").value = info.startStr;

    showmodal("user_calendaradd");

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
    lazyFetching: true,
    selectable: true,
    selectHelper: true,
    selectConstraint: {
      start: "00:01",
      end: "23:59",
    },
    height: "auto",
    selectOverlap: checkoverlapself,
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
    console.log("testasda");
    calendar_delete("user_calendarevent");
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
});
