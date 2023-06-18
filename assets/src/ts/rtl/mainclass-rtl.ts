/**
 * Created by Jamal on 8/23/2019.
 */
export default class mainclass {
    static importImages() {
        const images = mainclass.importAll(require.context('../../images', false, /\.(png|jpe?g|svg|gif|webp)$/));
    }

    static importAll(r:any) {
        return r.keys().map(r);
    }


};