<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Admin Panel</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

</html>

@extends('admin.layouts.app')

@section('title','Home Page')

@push('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')

<div class="sidebar">

    <div class="logo">
        E-Commerce Admin
    </div>

    <ul>

        <li>
            <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
        </li>

        <div class="menu-title">Category Management</div>

        <li>
            <a href="{{ route('add.category') }}">➕ Add Category</a>
        </li>

        <li>
            <a href="#">📂 Manage Categories</a>
        </li>

        <div class="menu-title">Sub Category</div>

        <li>
            <a href="#">➕ Add Sub Category</a>
        </li>

        <li>
            <a href="#">📁 Manage Sub Categories</a>
        </li>

        <div class="menu-title">Products</div>

        <li>
            <a href="#">🛍 Add Product</a>
        </li>

        <li>
            <a href="#">📦 Manage Products</a>
        </li>

        <div class="menu-title">Orders</div>

        <li>
            <a href="#">📋 Order List</a>
        </li>

        <div class="menu-title">Customers</div>

        <li>
            <a href="#">👥 Customer List</a>
        </li>

        <div class="menu-title">Settings</div>

        <li>
            <a href="#">⚙ Settings</a>
        </li>

        <li>
            <a href="#">🚪 Logout</a>
        </li>

    </ul>

</div>

<!-- Main Content -->
<div class="main">

    <!-- Navbar -->
    <div class="navbar">

        <h2>Dashboard</h2>

        <div class="admin-info">
            Welcome Admin
        </div>

    </div>

    <!-- Content -->
    <div class="content">

        @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
        @endif

        <h1>E-Commerce Dashboard</h1>
        <p>Manage categories, products, orders and customers.</p>

        <!-- Dashboard Cards -->
        <div class="cards">

            <div class="card">
                <h3>Total Categories</h3>
                <p>12</p>
            </div>

            <div class="card">
                <h3>Total Sub Categories</h3>
                <p>35</p>
            </div>

            <div class="card">
                <h3>Total Products</h3>
                <p>250</p>
            </div>

            <div class="card">
                <h3>Total Orders</h3>
                <p>95</p>
            </div>

            <div class="card">
                <h3>Total Customers</h3>
                <p>120</p>
            </div>

            <div class="card">
                <h3>Today's Sales</h3>
                <p>₹25,500</p>
            </div>

        </div>

        <!-- Recent Orders -->
        <div class="table-box">

            <h3>Recent Orders</h3>

            <br>

            <table>

                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>#1001</td>
                        <td>Harsh Shah</td>
                        <td>₹2,500</td>
                        <td>Delivered</td>
                    </tr>

                    <tr>
                        <td>#1002</td>
                        <td>Amit Patel</td>
                        <td>₹1,200</td>
                        <td>Pending</td>
                    </tr>

                    <tr>
                        <td>#1003</td>
                        <td>Raj Shah</td>
                        <td>₹3,800</td>
                        <td>Shipped</td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection