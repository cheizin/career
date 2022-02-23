<?php
if(!$_SERVER['REQUEST_METHOD'] == "POST")
{
  exit();
}
session_start();
include("controllers/setup/connect.php");
f1();

?>

    <form id="form1" runat="server">
    <div>
      <table width="100%" align="center">
        <tr>
          <td colspan="2">
          </td>
        </tr>
        <tr>
          <td>
            <div id="starttime"></div><br />
            <div id="endtime"></div><br />
            <div id="showtime"></div>
          </td>
        </tr>
        <tr>
          <td>

              <br />

          </td>

        </tr>
      </table>
      <br />

    </div>
    </form>
