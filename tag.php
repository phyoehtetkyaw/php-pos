<?php

include_once "includes/header.php";

$tag = new Tag();
$data = $tag->index();
$i = 1;

if ($tag->store(request: $_POST)) {
    echo "<script>location.href='tag.php'</script>";
}

if ($tag->update(request: $_POST)) {
    echo "<script>location.href='tag.php'</script>";
}

if ($tag->destroy(request: $_POST)) {
    echo "<script>location.href='tag.php'</script>";
}
?>

<div class="flex justify-between items-center">
    <h1 class="text-3xl font-bold">Tag</h1>
    <button onclick="toggleModal('#add-tag')" class="bg-violet-800 hover:bg-violet-500 px-7 py-1 text-white block text-sm rounded-sm">Add</button>
</div>
<table class="w-full mt-5 bg-gray-100 table-auto rounded-md">
    <thead>
        <tr>
            <th class="text-left">No.</th>
            <th class="text-left">Name</th>
            <th class="text-left">Options</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($data as $item): ?>
            <tr class="hover:bg-gray-200">
                <td><?= $i; $i++; ?></td>
                <td><?= $item->name; ?></td>
                <td>
                    <button onclick="toggleModal('#edit-tag', <?= $item->id; ?>)" class="bg-orange-500 hover:bg-orange-600 px-7 py-1 text-white text-sm rounded-sm">Edit</button>
                    <button onclick="toggleModal('#destroy-tag', <?= $item->id; ?>)" class="bg-red-500 hover:bg-red-600 px-7 py-1 text-white text-sm rounded-sm">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<div class="hidden modal" id="add-tag">
    <div class="absolute top-0 left-0 w-full h-screen bg-black/70 flex justify-center items-center">
        <div class="w-4/12 px-10 py-10 rounded-lg shadow-2xl bg-white h-fit">
            <h1 class="text-2xl font-bold mb-5 text-center">Add Tag</h1>
            <form method="post">
                <div class="mb-5">
                    <label class="font-bold block mb-2" for="name">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" class="block p-1 border-gray-400 w-full rounded-sm text-sm">
                </div>
                <div class="space-x-1">
                    <button onclick="closeModals()" type="button" class="bg-slate-200 px-5 rounded-sm py-1 text-sm hover:bg-slate-300">Close</button>
                    <button type="submit" name="add-submit" class="bg-violet-800 text-white px-5 rounded-sm py-1 text-sm hover:bg-violet-600">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="hidden modal" id="edit-tag">
    <div class="absolute top-0 left-0 w-full h-screen bg-black/70 flex justify-center items-center">
        <div class="w-4/12 px-10 py-10 rounded-lg shadow-2xl bg-white h-fit">
            <h1 class="text-2xl font-bold mb-5 text-center">Edit Tag</h1>
            <form method="post">
                <input type="hidden" id="edit-id" name="id">
                <div class="mb-5">
                    <label class="font-bold block mb-2" for="name">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" class="block p-1 border-gray-400 w-full rounded-sm text-sm">
                </div>
                <div class="space-x-1">
                    <button onclick="closeModals()" type="button" class="bg-slate-200 px-5 rounded-sm py-1 text-sm hover:bg-slate-300">Close</button>
                    <button type="submit" name="update-submit" class="bg-violet-800 text-white px-5 rounded-sm py-1 text-sm hover:bg-violet-600">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="hidden modal" id="destroy-tag">
    <div class="absolute top-0 left-0 w-full h-screen bg-black/70 flex justify-center items-center">
        <div class="w-4/12 px-10 py-10 rounded-lg shadow-2xl bg-white h-fit">
            <div class="mb-5">
                <h1 class="text-2xl font-bold mb-3 text-center">Delete Tag</h1>
                <p class="text-center">Are you sure, you want to delete?</p>
            </div>
            <form method="post">
                <input type="hidden" id="destroy-id" name="id">
                <div class="space-x-1 flex justify-center">
                    <button onclick="closeModals()" type="button" class="bg-slate-200 px-5 rounded-sm py-1 text-sm hover:bg-slate-300">Close</button>
                    <button type="submit" name="destroy-submit" class="bg-violet-800 text-white px-5 rounded-sm py-1 text-sm hover:bg-violet-600">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php"; ?>