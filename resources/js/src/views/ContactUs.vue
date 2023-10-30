<template>
    <section class="add-new container px-5 mb-4">

        <div class="details-div">
            <div class="title p-3 text-left">
                <p>{{$trans('contact.send_message')}} </p>
            </div>


            <form class="m-3">

                <input type="text" class="mb-3 input-contact p-2" :placeholder="$trans('contact.name')"
                       style="width: 100%; height: 50px;">

                <textarea class=" input-contact" style="height: 300px; width: 100%;" :placeholder="$trans('contact.message')">
                  </textarea>

                <div class="upload-image">
                    <br>
                    <div class="">

                        <div class="imgUp text-center">
                            <div class="imagePreview"></div>
                            <label class="btn btn-dark">
                                {{ $trans('contact.upload') }}<input type="file" class="uploadFile img d-none" value="Upload Photo"
                                             style="width: 0px;height: 0px;overflow: hidden;">
                            </label>


                        </div><!-- row -->
                    </div><!-- container -->


                </div>

                <div class="action-details ">
                    <button type="submit" class="btn-active px-5 py-2 fw-bold">{{ $trans('contact.send') }}</button>
                </div>

            </form>
        </div>
    </section>
</template>
