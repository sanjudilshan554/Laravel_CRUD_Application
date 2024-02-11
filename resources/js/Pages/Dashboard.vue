<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Student Management System</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div>
                        <section>
                            <div class="text-center mt-5">
                                <h1>Student Management System Dashboard</h1>
                            </div>
                            <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add New User
                            </button>
                        </section>
                        <section>
                            <table class="table mt-5 text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">uer id</th>
                                        <th scope="col">name</th>
                                        <th scope="col">image</th>
                                        <th scope="col">age</th>
                                        <th scope="col">status</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody class="table_data">

                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script >

</script>

<style></style>