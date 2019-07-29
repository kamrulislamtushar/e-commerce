



# Topics
1. ### [Introduction](#1-introduction-)
2. ### [Requirements](#2-requirements-)
3. ### [Installation & Configuration](#3-installation--configuration-)
4. ### [License](#4-license-)
5. ### [Miscellaneous](#5-miscellaneous-)

### 1. Introduction <a name="#1-introduction-"></a>:


It packs in lots of demanding features that allows your business to scale in no time:

* Multiple Channels, Locale, Currencies.
* Built-in Access Control Layer.
* Beautiful and Responsive Storefront.
* Descriptive and Simple Admin Panel.
* Admin Dashboard.
* Custom Attributes.
* Built on Modular Approach.
* Support for Multiple Store Themes.
* Multistore Inventory System.
* Orders Management System.
* Customer Cart, Wishlist, Product Reviews.
* Simple and Configurable Products.

**For Developers**:
Dev guys can take advantage of two of the hottest frameworks used in this project Laravel and Vue.js, both of these frameworks have been used in Bagisto.
Bagisto is using power of both of these frameworks and making best out of it out of the box.

### 2. Requirements <a name="#requirements"></a>:

* **OS**: Ubuntu 16.04 LTS or higher.
* **SERVER**: Apache 2 or NGINX
* **RAM**: 2 GB or higher.
* **PHP**: 7.1.17 or higher.
* **Processor**: Clock Cycle 1 Ghz or higher.
* **For MySQL users**: 5.7.23 or higher.
* **For MariaDB users**: 10.2.7 or Higher.
* **Node**: 8.11.3 LTS or higher.
* **Composer**: 1.6.5 or higher.

### 3. Installation & Configuration <a name="#configuration"></a>:

**1. Clone this project

**Now configure your database:**

.env file setup

* **APP_URL**
* **DB_CONNECTION**
* **DB_HOST**
* **DB_PORT**
* **DB_DATABASE**
* **DB_USERNAME**
* **DB_PASSWORD**

Although, mailer environment variables are also required to be set up as **Bagisto** requires emails to send to customers and admins for various functionalities that are built in.



~~~
2. Compy .envexample to .env
~~~

~~~
3. php artisan key:generate
~~~

~~~
4. php artisan migrate
~~~

~~~
5. php artisan db:seed
~~~

~~~
6. php artisan vendor:publish
-> Press 0 and then press enter to publish all assets and configurations.
~~~

~~~
7. php artisan storage:link
~~~

~~~
8. composer dump-autoload
~~~




##### On server:

~~~
Open the specified entry point in your hosts file in browser or make entry in hosts file if not done.
~~~

##### On local:

~~~
php artisan serve
~~~


**How to log in as admin:**

> *http(s)://example.com/admin/login*

~~~
email:admin@example.com
password:admin123
~~~

**How to log in as customer:**

*You can directly register as customer and then login.*

> *http(s)://example.com/customer/register*



