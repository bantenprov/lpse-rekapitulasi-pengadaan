## lpse-rekapitulasi-pengadaan


[![Join the chat at https://gitter.im/lpse-rekapitulasi-pengadaan/Lobby](https://badges.gitter.im/lpse-rekapitulasi-pengadaan/Lobby.svg)](https://gitter.im/lpse-rekapitulasi-pengadaan/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/lpse-rekapitulasi-pengadaan/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/lpse-rekapitulasi-pengadaan/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/lpse-rekapitulasi-pengadaan/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/lpse-rekapitulasi-pengadaan/build-status/master)


[![Latest Stable Version](https://poser.pugx.org/bantenprov/lpse-rekapitulasi-pengadaan/v/stable)](https://packagist.org/packages/bantenprov/lpse-rekapitulasi-pengadaan)
[![Total Downloads](https://poser.pugx.org/bantenprov/lpse-rekapitulasi-pengadaan/downloads)](https://packagist.org/packages/bantenprov/lpse-rekapitulasi-pengadaan)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/lpse-rekapitulasi-pengadaan/v/unstable)](https://packagist.org/packages/bantenprov/lpse-rekapitulasi-pengadaan)
[![License](https://poser.pugx.org/bantenprov/lpse-rekapitulasi-pengadaan/license)](https://packagist.org/packages/bantenprov/lpse-rekapitulasi-pengadaan)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/lpse-rekapitulasi-pengadaan/d/monthly)](https://packagist.org/packages/bantenprov/lpse-rekapitulasi-pengadaan)
[![Daily Downloads](https://poser.pugx.org/bantenprov/lpse-rekapitulasi-pengadaan/d/daily)](https://packagist.org/packages/bantenprov/lpse-rekapitulasi-pengadaan)

Rekapitulasi Pengadaan

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/lpse-rekapitulasi-pengadaan:dev-master
```
- Latest release:

```bash
$ composer require bantenprov/lpse-rekapitulasi-pengadaan:v0.1.0
```

## download via github
~~~
bash
$ git clone https://github.com/bantenprov/lpse-rekapitulasi-pengadaan.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\RekapitulasiPengadaan\RekapitulasiPengadaanServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=rekapitulasi-pengadaan-assets
$ php artisan vendor:publish --tag=rekapitulasi-pengadaan-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/rekapitulasi-pengadaan',
    components: {
      main: resolve => require(['./components/views/bantenprov/rekapitulasi-pengadaan/DashboardRekapitulasiPengadaan.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Rekapitulasi Pengadaan"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/rekapitulasi-pengadaan',
      components: {
        main: resolve => require(['./components/bantenprov/rekapitulasi-pengadaan/RekapitulasiPengadaanAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "Rekapitulasi Pengadaan"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Rekapitulasi Pengadaan',
          link: '/dashboard/rekapitulasi-pengadaan',
          icon: 'fa fa-angle-double-right'
        }
  ]
},
//== ...
        {
          name: 'Rekapitulasi Pengadaan',
          link: '/admin/dashboard/rekapitulasi-pengadaan',
          icon: 'fa fa-angle-double-right'
        },
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import RekapitulasiPengadaan from './components/bantenprov/rekapitulasi-pengadaan/RekapitulasiPengadaan.chart.vue';
Vue.component('echarts-rekapitulasi-pengadaan', RekapitulasiPengadaan);

import RekapitulasiPengadaanKota from './components/bantenprov/rekapitulasi-pengadaan/RekapitulasiPengadaanKota.chart.vue';
Vue.component('echarts-rekapitulasi-pengadaan-kota', RekapitulasiPengadaanKota);

import RekapitulasiPengadaanTahun from './components/bantenprov/rekapitulasi-pengadaan/RekapitulasiPengadaanTahun.chart.vue';
Vue.component('echarts-rekapitulasi-pengadaan-tahun', RekapitulasiPengadaanTahun);

import RekapitulasiPengadaanAdminShow from './components/bantenprov/rekapitulasi-pengadaan/RekapitulasiPengadaanAdmin.show.vue';
Vue.component('admin-view-rekapitulasi-pengadaan-tahun', RekapitulasiPengadaanAdminShow);

//== Echarts Rekapitulasi Pengadaan

import RekapitulasiPengadaanBar01 from './components/views/bantenprov/rekapitulasi-pengadaan/RekapitulasiPengadaanBar01.vue';
Vue.component('rekapitulasi-pengadaan-bar-01', RekapitulasiPengadaanBar01);

import RekapitulasiPengadaanBar02 from './components/views/bantenprov/rekapitulasi-pengadaan/RekapitulasiPengadaanBar02.vue';
Vue.component('rekapitulasi-pengadaan-bar-02', RekapitulasiPengadaanBar02);

//== mini bar charts
import RekapitulasiPengadaanBar03 from './components/views/bantenprov/rekapitulasi-pengadaan/RekapitulasiPengadaanBar03.vue';
Vue.component('rekapitulasi-pengadaan-bar-03', RekapitulasiPengadaanBar03);

import RekapitulasiPengadaanPie01 from './components/views/bantenprov/rekapitulasi-pengadaan/RekapitulasiPengadaanPie01.vue';
Vue.component('rekapitulasi-pengadaan-pie-01', RekapitulasiPengadaanPie01);

import RekapitulasiPengadaanPie02 from './components/views/bantenprov/rekapitulasi-pengadaan/RekapitulasiPengadaanPie02.vue';
Vue.component('rekapitulasi-pengadaan-pie-02', RekapitulasiPengadaanPie02);

//== mini pie charts
import RekapitulasiPengadaanPie03 from './components/views/bantenprov/rekapitulasi-pengadaan/RekapitulasiPengadaanPie03.vue';
Vue.component('rekapitulasi-pengadaan-pie-03', RekapitulasiPengadaanPie03);
```
