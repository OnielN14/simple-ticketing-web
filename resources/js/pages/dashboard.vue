<template>
  <div class="--dashboard-layout">
      <nav class="navbar">
          <ul class="nav">
              <li class="nav-item">
                  <router-link to="/" class="nav-link">Ticket Transaction</router-link>
                  <router-link to="/check-in" class="nav-link">Check-In</router-link>
                  <router-link to="/report" class="nav-link">Report</router-link>
              </li>
          </ul>
      </nav>
    
    <div class="--dashboard-content">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>

    .--dashboard-layout{
        min-height: calc(100vh - 70px);
        display: grid;
        grid-template-columns: 200px 1fr;

        .navbar{
            border-right: 1px solid gray;
        }

        .--dashboard-content{
            padding:8px;
        }
    }

</style>