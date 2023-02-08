<section class="photo-gallery py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Modifier l'objet</h2>
                </div>
            </div>
            <form action="#" class="text-center mx-auto col-6" method="post">
                <div class="mb-3"><input class="form-control" type="text" name="nom" placeholder="Nouveau titre"></div>
                <div class="mb-3"><input class="form-control" type="number" name="nombre" placeholder="Nouveau prix"></div>
                <div class="mb-4"><input class="form-control" type="text" name="desc" placeholder="Nouvelle description"></div>
                <div class="mb-3"><button class="btn d-block w-100" type="submit">Appliquer</button></div>
            </form>
            <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-3 photos">
                <div class="col item mb-2"><img class="img-fluid mb-2" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" id="discard" class="btn">Supprimer</a></div>
                <div class="col item mb-2"><img class="img-fluid mb-2" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" id="discard" class="btn">Supprimer</a></div>
                <div class="col item mb-2"><img class="img-fluid mb-2" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" id="discard" class="btn">Supprimer</a></div>
                <div class="col item mb-2"><img class="img-fluid mb-2" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" id="discard" class="btn">Supprimer</a></div>
                <div class="col item mb-2"><img class="img-fluid mb-2" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" id="discard" class="btn">Supprimer</a></div>
                <div class="col item mb-2"><img class="img-fluid mb-2" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" id="discard" class="btn">Supprimer</a></div>
            </div>
        </div>
        <form class="mb-3 mx-auto col-6">
            <label for="formFileMultiple" class="form-label">Ajouter une nouvelle photo :</label>
            <input name="picture" class="form-control" accept=".png, .jpg" type="file" id="formFileMultiple">
            <div class="mb-3"><button class="btn d-block w-100" type="submit">Ajouter</button></div>
        </form>
    </section>